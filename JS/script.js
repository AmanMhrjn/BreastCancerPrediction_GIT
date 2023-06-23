// LOgin validation
function validateLogin(){
    userName = document.getElementById('user-name').value;
    password = document.getElementById('pass').value;
    form = document.getElementById('login_form');
    validate = true;

    userNameError = document.getElementById('username-error');
    passwordError = document.getElementById('password-error');

    if(userName == ""){
        userNameError.innerHTML="Username cannot be EMPTY";
        userNameError.style.display="block";
        validate = false;
    }

    if(password == ""){
        passwordError.innerHTML="Password cannot be EMPTY";
        passwordError.style.display="block";
        validate = false;
    }

    if(validate){
        form.submit();
    }
}


// Signup validation
function validateSignup(){
    fullName = document.getElementById('full-name').value;
    userName = document.getElementById('user-name').value;
    address = document.getElementById('address').value;
    age = document.getElementById('age').value;
    gender = document.getElementById('gender').value;
    email = document.getElementById('email').value;
    password = document.getElementById('password').value;
    
    fullNameError = document.getElementById('fullname-error');
    userNameError = document.getElementById('username-error');
    addressError = document.getElementById('address-error');
    ageError = document.getElementById('age-error');
    genderError = document.getElementById('gender-error');
    emailError = document.getElementById('email-error');
    passwordError = document.getElementById('password-error');

    form = document.getElementById('signUp_form');
    validate = true;

    if(fullName == ""){
        fullNameError.innerHTML="Fullname cannot be EMPTY";
        fullNameError.style.display="block";
        validate = false;
    }

    if(userName == ""){
        userNameError.innerHTML="Username cannot be EMPTY";
        userNameError.style.display="block";
        validate = false;
    }

    if(address == ""){
        addressError.innerHTML="Address cannot be EMPTY";
        addressError.style.display="block";
        validate = false;
    }

    if(age == ""){
        ageError.innerHTML="Age cannot be EMPTY";
        ageError.style.display="block";
        validate = false;
    }

    if(gender == ""){
        genderError.innerHTML="Gender cannot be EMPTY";
        genderError.style.display="block";
        validate = false;
    }

    if(email == ""){
        emailError.innerHTML="Email cannot be EMPTY";
        emailError.style.display="block";
        validate = false;
    }

    if(password == ""){
        passwordError.innerHTML="Password cannot be EMPTY";
        passwordError.style.display="block";
        validate = false;
    }
    //else{
    //     if(password.length<12){
    //         passwordError.innerHTML="Password cannot be less than 12 characters";
    //         passwordError.style.display="block";
    //         validate = false;
    //     }
    // }

    

    if(validate){
        form.submit();
    }
}
