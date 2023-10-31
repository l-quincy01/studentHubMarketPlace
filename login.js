document.addEventListener('DOMContentLoaded', function(){
    const loginForm = document.querySelector("form"),
    userField = document.querySelector("#username"),
    userInput = loginForm.querySelector('input[placeholder="Username"]'),
    passwordField = document.querySelector("#password"),
    passwordInput = loginForm.querySelector('input[placeholder="Password"]'),
    loginBtn = loginForm.querySelector('.submit-btn');
    

    // check for valid username and password upon login
    loginBtn.addEventListener("click", function (e){
        e.preventDefault();
        // if input fields are empty, alert user
        if(userInput.value ==""){
            userField.classList.add("shake", "error");
        }else{
            checkUsername(); //check if username is valid
        }
        // if input fields are empty, alert user
        if(passwordInput.value ==""){
            passwordField.classList.add("shake", "error");
        }
        else{
            checkPassword();
        }

        setTimeout(()=>{
            userField.classList.remove("shake");
            passwordField.classList.remove("shake");
        }, 500);

        userInput.addEventListener("keyup", function (){
            checkUsername();
        });

        passwordInput.addEventListener("keyup", function (){
            checkPassword();
        });

        function checkUsername(){
            let validName = /^[a-zA-Z0-9_$#@]{8,15}$/;
            if(!userInput.value.match(validName)){
                userField.classList.add("error");
                let errorTxt = userField.querySelector(".errorTxt");
                (userInput.value != "") ? errorTxt.innerText = "Enter a valid username" : errorTxt.innerText = "Username cant be empty";
            }else{
                userField.classList.remove("error")
            }
        }

        function checkPassword(){
            /*At least 8 characters long.
                Contains both uppercase and lowercase letters.
                Contains at least one digit.
                Contains at least one special character*/
            let validPassword = /^(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
            if(!passwordInput.value.match(validPassword)){
                passwordField.classList.add("error");
                let errorTxt = passwordField.querySelector(".errorTxt");
                (passwordField.value != '') ? errorTxt.innerText = "Enter a valid password" : errorTxt.innerText = "Password cant be empty";
            }else{
                passwordField.classList.remove("error")
            }
        }

        

        if(!userField.classList.contains('error') && !passwordField.classList.contains('error')){
            window.location.href = 'loadingScreen.php';
            console.log('Form submitted');
        }
    });
    
});



