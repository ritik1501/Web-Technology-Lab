<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calc</title>
</head>

<style>
    body {
        position: relative;
        top: 20vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url(https://images.ctfassets.net/hrltx12pl8hq/6TOyJZTDnuutGpSMYcFlfZ/4dfab047c1d94bbefb0f9325c54e08a2/01-nature_668593321.jpg?fit=fill&w=480&h=270);
        background-size: cover;
    }
    .container {
        text-align: center;
        box-sizing: border-box;
    }
    form{
        display: flex;
        flex-direction: column;
        padding: 20px;
    }
    input, select {
        font-size: 20px;
        height: 40px;
        width: 300px;
        border-radius: 1cm;
        padding-left: 15px;
        outline: none;
        margin: 10px 0;
    }
    select, button{
        width: 150px;
        align-self: center;
    }
    button {
        background: linear-gradient(to right, #9e41f5, #0026fa);
        color: white;
        height: 40px;
        border-radius: 25px;
        font-size: 25px;
        outline: none;
        margin: 10px 0;
    }
    .calc {
        color: gray;
        display: inline-block;
        background-color: rgb(28, 29, 28);
        border-radius: 1cm;
        padding: 10px;
        padding-bottom: 35px;
        opacity: 0.9;
    }
</style>

<body>
    <div class="container">
        <div class="calc">
            <h1>PHP Calculator</h1>
            <form action="index.php" method="POST">
                <input type="text" name="first" id="first">
                <select name="operation">
		        	<option value="plus">Plus</option>
		            <option value="minus">Minus</option>
		            <option value="multiply">Multiply</option>
		            <option value="divided by">Divide</option>
		        </select>
                <input type="text" name="second" id="second">
                <button name="submit" type="submit">Calculate</button>
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                if(is_numeric($_POST['first']) && is_numeric($_POST['second']))
                {
                    if($_POST['operation'] == 'plus')
                    {
                        $total = $_POST['first'] + $_POST['second'];	
                    }
                    if($_POST['operation'] == 'minus')
                    {
                        $total = $_POST['first'] - $_POST['second'];	
                    }
                    if($_POST['operation'] == 'multiply')
                    {
                        $total = $_POST['first'] * $_POST['second'];	
                    }
                    if($_POST['operation'] == 'divided by')
                    {
                        $total = $_POST['first'] / $_POST['second'];	
                    }
                    echo "<h1>{$_POST['first']} {$_POST['operation']} {$_POST['second']} equals {$total}</h1>";
                
                } else {
                    echo '<h2>Numeric values are required</h2>';
                
                }
            }
        ?>
        </div>
    </div>
</body>
</html>