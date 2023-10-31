// function validateInput(input) {
//     var value = parseFloat(input.value);
//     if (value === 0) {
//         alert('Please enter a non-zero value in this field.');
//         input.value = ''; // Clear the field
//     }
// }


function validateForm() {
    // Get references to all number input fields
    const inputFields = document.querySelectorAll('input[type="number"]');
    let valid = true;

    // Loop through each input field and check the value
    inputFields.forEach(function (input) {
      const min = parseFloat(input.min);
      const max = parseFloat(input.max);
      const value = parseFloat(input.value);

      // Check if the value is within the specified range
      if (isNaN(value) || value < min || value > max) {
        valid = false;
        // You can also add custom validation messages here if needed
      }
    });

    // If any input is invalid, prevent form submission and display a message
    if (!valid) {
      alert('Please enter valid values within the specified range.');
      return false;
    }

    // If all inputs are valid, allow the form to be submitted
    return true;
  }

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
    else{
        if(password.length<12){
            passwordError.innerHTML="Password cannot be less than 12 characters";
            passwordError.style.display="block";
            validate = false;
        }
    }
    if(validate){
        form.submit();
    }
}


// // validation of prediction
// function validatePredict(){
//     rdMean = document.getElementById('radiusMean').value;
//     txtMean = document.getElementById('textureMean').value;
//     perMean = document.getElementById('perimeterMean').value;
//     areaMean = document.getElementById('areaMean').value;
//     smtMean = document.getElementById('smoothnessMean').value;
//     cmptMean = document.getElementById('compactnessMean').value;
//     ccvtMean = document.getElementById('concavityMean').value;
//     cvpMean = document.getElementById('concaveMean').value;
//     smtryMean = document.getElementById('symmetryMean').value;
//     fdMean = document.getElementById('fractalDimensionMean').value;

//     rdSe = document.getElementById('radiusSe').value;
//     txtSe = document.getElementById('textureSe').value;
//     perSe = document.getElementById('perimeterSe').value;
//     areaSe = document.getElementById('areaSe').value;
//     smtSe = document.getElementById('smoothnessSe').value;
//     cmptSe = document.getElementById('compactnessSe').value;
//     ccvtSe = document.getElementById('concavitySe').value;
//     cvpSe = document.getElementById('concaveSe').value;
//     smtrySe = document.getElementById('symmetrySe').value;
//     fdSe = document.getElementById('fractalDimensionSe').value;

//     rdWorst = document.getElementById('radiusWorst').value;
//     txtWorst = document.getElementById('textureWorst').value;
//     perWorst = document.getElementById('perimeterWorst').value;
//     areaWorst = document.getElementById('areaWorst').value;
//     smtWorst = document.getElementById('smoothnessWorst').value;
//     cmptWorst = document.getElementById('compactnessWorst').value;
//     ccvtWorst = document.getElementById('concavityWorst').value;
//     cvpWorst = document.getElementById('concaveWorst').value;
//     smtryWorst = document.getElementById('symmetryWorst').value;
//     fdWorst = document.getElementById('fractalDimensionWorst').value;

//     validate = true;

//     rdMeanError = document.getElementById('radiusmean-error').value;
//     txtMeanError = document.getElementById('texturemean-error').value;
//     perMeanError = document.getElementById('perimetermean-error').value;
//     areaMeanError = document.getElementById('areamean-error').value;
//     smtMeanError = document.getElementById('smoothnessmean-error').value;
//     cmptMeanError = document.getElementById('compactnessmean-error').value;
//     ccvtMeanError = document.getElementById('concavitymean-error').value;
//     cvpMeanError = document.getElementById('concavemean-error').value;
//     smtryMeanError = document.getElementById('symmetrymean-error').value;
//     fdMeanError = document.getElementById('fractalDimensionmean-error').value;

//     rdSeError = document.getElementById('radiusse-error').value;
//     txtSeError = document.getElementById('texturese-error').value;
//     perSeError = document.getElementById('perimeterse-error').value;
//     areaSeError = document.getElementById('arease-error').value;
//     smtSeError = document.getElementById('smoothnessse-error').value;
//     cmptSeError = document.getElementById('compactnessse-error').value;
//     ccvtSeError = document.getElementById('concavityse-error').value;
//     cvpSeError = document.getElementById('concavese-error').value;
//     smtrySeError = document.getElementById('symmetryse-error').value;
//     fdSeError = document.getElementById('fractalDimensionse-error').value;

//     rdWorstError = document.getElementById('radiusworst-error-error').value;
//     txtWorstError = document.getElementById('textureworst-error').value;
//     perWorstError = document.getElementById('perimeterworst-error').value;
//     areaWorstError = document.getElementById('areaworst-error').value;
//     smtWorstError = document.getElementById('smoothnessworst-error').value;
//     cmptWorstError = document.getElementById('compactnessworst-error').value;
//     ccvtWorstError = document.getElementById('concavityworst-error').value;
//     cvpWorstError = document.getElementById('concaveworst-error').value;
//     smtryWorstError = document.getElementById('symmetryworst-error').value;
//     fdWorstError = document.getElementById('fractalDimensionworst-error').value;

//     if(rdMean == ""){
//         rdMeanError.innerHTML="Username cannot be EMPTY";
//         rdMeanError.style.display="block";
//         validate = false;
//     }

//     if(txtMean == ""){
//         txtMeanError.innerHTML="Username cannot be EMPTY";
//         txtMeanError.style.display="block";
//         validate = false;
//     }

//     if(perMean == ""){
//         perMeanError.innerHTML="Username cannot be EMPTY";
//         perMeanError.style.display="block";
//         validate = false;
//     }

//     if(areaMean == ""){
//         areaMeanError.innerHTML="Username cannot be EMPTY";
//         areaMeanError.style.display="block";
//         validate = false;
//     }

//     if(smtMean == ""){
//         smtMeanError.innerHTML="Username cannot be EMPTY";
//         smtMeanError.style.display="block";
//         validate = false;
//     }

//     if(cmptMean == ""){
//         cmptMeanError.innerHTML="Username cannot be EMPTY";
//         cmptMeanError.style.display="block";
//         validate = false;
//     }

//     if(ccvtMean == ""){
//         ccvtMeanError.innerHTML="Username cannot be EMPTY";
//         ccvtMeanError.style.display="block";
//         validate = false;
//     }

//     if(cvpMean == ""){
//         cvpMeanError.innerHTML="Username cannot be EMPTY";
//         cvpMeanError.style.display="block";
//         validate = false;
//     }

//     if(smtryMean == ""){
//         smtryMeanError.innerHTML="Username cannot be EMPTY";
//         smtryMeanError.style.display="block";
//         validate = false;
//     }

//     if(fdMean == ""){
//         fdMeanError.innerHTML="Username cannot be EMPTY";
//         fdMeanError.style.display="block";
//         validate = false;
//     }

//     // -------------------------------
//     if(rdSe == ""){
//         rdSeError.innerHTML="Username cannot be EMPTY";
//         rdSeESe.style.display="block";
//         validate = false;
//     }

//     if(txtSe == ""){
//         txtSeError.innerHTML="Username cannot be EMPTY";
//         txtSeError.style.display="block";
//         validate = false;
//     }

//     if(perSe == ""){
//         perSeError.innerHTML="Username cannot be EMPTY";
//         perSeError.style.display="block";
//         validate = false;
//     }

//     if(areaSe == ""){
//         areaSeError.innerHTML="Username cannot be EMPTY";
//         areaSeError.style.display="block";
//         validate = false;
//     }

//     if(smtSe == ""){
//         smtSeError.innerHTML="Username cannot be EMPTY";
//         smtSeError.style.display="block";
//         validate = false;
//     }

//     if(cmptSe == ""){
//         cmptSeError.innerHTML="Username cannot be EMPTY";
//         cmptSeError.style.display="block";
//         validate = false;
//     }

//     if(ccvtSe == ""){
//         ccvtSeError.innerHTML="Username cannot be EMPTY";
//         ccvtSeError.style.display="block";
//         validate = false;
//     }

//     if(cvpSe == ""){
//         cvpSeError.innerHTML="Username cannot be EMPTY";
//         cvpSeError.style.display="block";
//         validate = false;
//     }

//     if(smtrySe == ""){
//         smtrySeError.innerHTML="Username cannot be EMPTY";
//         smtrySeError.style.display="block";
//         validate = false;
//     }

//     if(fdSe == ""){
//         fdSeError.innerHTML="Username cannot be EMPTY";
//         fdSeError.style.display="block";
//         validate = false;
//     }
    
//     // -------------------------------
//     if(rdWorst == ""){
//         rdWorstError.innerHTML="Username cannot be EMPTY";
//         rdWorstESe.style.display="block";
//         validate = false;
//     }

//     if(txtWorst == ""){
//         txtWorstError.innerHTML="Username cannot be EMPTY";
//         txtWorstError.style.display="block";
//         validate = false;
//     }

//     if(perWorst == ""){
//         perWorstError.innerHTML="Username cannot be EMPTY";
//         perWorstError.style.display="block";
//         validate = false;
//     }

//     if(areaWorst == ""){
//         areaWorstError.innerHTML="Username cannot be EMPTY";
//         areaWorstError.style.display="block";
//         validate = false;
//     }

//     if(smtWorst == ""){
//         smtWorstError.innerHTML="Username cannot be EMPTY";
//         smtWorstError.style.display="block";
//         validate = false;
//     }

//     if(cmptWorst == ""){
//         cmptWorstError.innerHTML="Username cannot be EMPTY";
//         cmptWorstError.style.display="block";
//         validate = false;
//     }

//     if(ccvtWorst == ""){
//         ccvtWorstError.innerHTML="Username cannot be EMPTY";
//         ccvtWorstError.style.display="block";
//         validate = false;
//     }

//     if(cvpWorst == ""){
//         cvpWorstError.innerHTML="Username cannot be EMPTY";
//         cvpWorstError.style.display="block";
//         validate = false;
//     }

//     if(smtryWorst == ""){
//         smtryWorstError.innerHTML="Username cannot be EMPTY";
//         smtryWorstError.style.display="block";
//         validate = false;
//     }

//     if(fdWorst == ""){
//         fdWorstError.innerHTML="Username cannot be EMPTY";
//         fdWorstError.style.display="block";
//         validate = false;
//     }

//     if(validate){
//         form.submit();
//     }
// }