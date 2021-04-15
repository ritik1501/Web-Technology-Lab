let screen = document.getElementById('screen');
let button = document.querySelectorAll('button');
let screenValue = '';

for (item of button){
    item.addEventListener('click', (e)=>{
        let buttonText = e.target.innerText;
        if(buttonText == 'X'){
            buttonText = '*'
            screenValue += buttonText;
            screen.value += buttonText;
        }
        else if(buttonText == 'C'){
            screen.value = '';
            screenValue = '';
        }
        else if(buttonText == '='){
            try {
                screen.value = eval(screenValue);
            } catch (error) {
                screen.value = 'ERROR!!'
                alert("ERROR !! Please Enter Right Values...")
            }
        }
        else{
            screenValue += buttonText;
            screen.value = screenValue;
        }
    })
}