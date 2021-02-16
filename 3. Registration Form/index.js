let name = document.getElementById('name');
let email = document.getElementById('email');
let phone = document.getElementById('phone');
let password = document.getElementById('pass');
let validName = false;
let validEmail = false;
let validPhone = false;
let validPassword = false;
var message = ""

name.addEventListener('input', function () {
    let reg = /^[a-zA-Z]([ a-zA-Z]){2,20}$/;
    let str = name.value;
    if (reg.test(str)) {
        name.style.borderColor = 'green';
        name.style.borderWidth = '3px';
        validName = true;
    }
    else {
        name.style.borderColor = 'red';
        name.style.borderWidth = '3px';
        validName = false;
        message = "Name should contain alphabates only and must be in between 2-20";
    }
})

email.addEventListener('input', function () {
    let reg = /^([_\-\.a-zA-Z0-9]+)@([a-z]+)\.([a-z.]){2,20}$/;
    let str = email.value;
    if (reg.test(str)) {
        email.style.borderColor = 'green';
        email.style.borderWidth = '3px';
        validEmail = true;
    }
    else {
        email.style.borderColor = 'red';
        email.style.borderWidth = '3px';
        validEmail = false;
        message = "Email format is not valid. Email should be in proper format";
    }
})

phone.addEventListener('input', function () {
    let reg = /^([0-9]){10}$/;
    let str = phone.value;
    if (reg.test(str)) {
        phone.style.borderColor = 'green';
        phone.style.borderWidth = '3px';
        validPhone = true;
    }
    else {
        phone.style.borderColor = 'red';
        phone.style.borderWidth = '3px';
        validPhone = false;
        message = "Phone Number should be 10 digits long and contains numbers only";
    }
})

password.addEventListener('input', function () {
    let reg = /^([a-zA-Z0-9!@#$%^&*]){8,20}$/;
    let str = password.value;
    if (reg.test(str)) {
        password.style.borderColor = 'green';
        password.style.borderWidth = '3px';
        validPassword = true;
    }
    else {
        password.style.borderColor = 'red';
        password.style.borderWidth = '3px';
        validPassword = false;
        message = "Password length must be 2-20";
    }
})

subMess = document.getElementById('subMess');
let btnSubmit = document.getElementById('submit');
btnSubmit.addEventListener('click', function(e){
    e.preventDefault();
    if(validEmail && validName && validPhone){
        subMess.innerHTML = `<h3>Your form is submitted Sucessfully...</h3>`;
    }
    else{        
        subMess.innerHTML = message;
        alert(message+'\nYour form is not submitted...Try Again with valid credentials')
    }
})