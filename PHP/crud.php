<?php
$link = mysqli_connect("localhost", "root", "", "web_tech");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Creating Datbase named Web_Tech
// $sql = "CREATE DATABASE web_tech";
// if(mysqli_query($link, $sql)){
//     echo "Database created successfully";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }

//Creating table named student
// $sql = "CREATE TABLE student(
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     first_name VARCHAR(30) NOT NULL,
//     last_name VARCHAR(30) NOT NULL,
//     email VARCHAR(70) NOT NULL UNIQUE
// )";
// if(mysqli_query($link, $sql)){
//     echo "Table created successfully.";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }

$message = '';
function basic(){
    $link = mysqli_connect("localhost", "root", "", "web_tech");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    return $link;
}
if(isset($_POST['addData']))
{
    $link = basic();
    $message = addData($link);
} 
function addData($link){
    $link = mysqli_connect("localhost", "root", "", "web_tech");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $firstName = mysqli_real_escape_string($link, $_REQUEST['firstName']);
    $lastName = mysqli_real_escape_string($link, $_REQUEST['lastName']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $sql = "INSERT INTO student (first_name, last_name, email) VALUES ('$firstName', '$lastName', '$email')";
    if(mysqli_query($link, $sql)){
        $message = "Records added successfully.";
    } else{
        $message = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    return $message;
}

function display(){
    $link = basic();
    $sql = "SELECT * FROM student";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo '<table class="table dark">';
                echo "<tr>";
                    echo "<th scope='col'>Id</th>";
                    echo "<th scope='col'>First Name</th>";
                    echo "<th scope='col'>Last Name</th>";
                    echo "<th scope='col'>Email</th>";
                    echo "<th scope='col'>Delete</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td><form action='crud.php' method='POST'><input type='text' name='id' value=".$row['id']." style='display:none;'><button class='btn btn-danger' name='del' type='submit'>Delete</button></form></td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

if(isset($_POST['del']))
{
    $link = basic();
    $sql = "DELETE FROM student WHERE id='".$_POST['id']."'";
    if(mysqli_query($link, $sql)){
        echo "Records were deleted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
} 

mysqli_close($link);
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CRUD with PHP</title>
</head>

<body>
    <section class="form my-5">
        <div class="container">
            <form action="crud.php" method="POST">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Karan" name="firstName">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Sharma" name="lastName">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                </div>
                <button type="submit" class="btn btn-danger" name="addData">Add Data</button>
                <p>
                    <?php echo $message ?>
                </p>
            </form>
        </div>
    </section>

    <section class="table">
        <div class="container">
            <?php display() ?>
        </div>
    </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>