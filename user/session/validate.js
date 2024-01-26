function validateLogin() {
    if (!validateUsername()){
        return false;
    } /*else if (!validatePassword()){
        return false;
    }*/
    return true;
}

function validateSingin() {
    if (!validateUsername()){
        return false;
    } else if (!validatePassword()){
        return false;
    }
    return true;
}

function validateEmail() {
    var emailInput = document.getElementById("email");
    var email = emailInput.value;

    // Add your email validation logic here
    var isValidLength = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    var isValidDomain = /^[^\s@]+@[^\s@]+[a-zA-Z]{2,}$/.test(email);
    var isValidNoDoubleCharacters = !/(\.{2,}|-{2,})/.test(email);
    
    var emailIsValid = isValidLength && isValidDomain && isValidNoDoubleCharacters;
    
    // Get the submit button
    var submitButton = document.querySelector("form button[type='submit']");

    // Disable or enable the submit button based on email validity
    if (emailIsValid) {
        submitButton.removeAttribute("disabled");
        emailInput.classList.remove("error-box");
        submitButton.style.cursor = "pointer";
    } else {
        submitButton.setAttribute("disabled", "disabled");
        emailInput.classList.add("error-box");
        submitButton.style.cursor = "not-allowed";
    }
}

function validateUsername() {
    var usernameInput = document.getElementById("username");

    // Get the submit button
    var submitButton = document.querySelector("form button[type='submit']");

    // Clear previous error state
    usernameInput.classList.remove("error-box");

    submitButton.removeAttribute("disabled");
    submitButton.style.cursor = "pointer";


    // Trim and get the username value
    var usernameValue = (usernameInput.value || '').trim();

    // Check if the username is empty, exceeds 100 characters, or has SQL injection attempts
    if (usernameValue === "" || usernameValue.length > 100 || /[\;\-\-]/.test(usernameValue)) {
        // Set error state
        usernameInput.classList.add("error-box");
        submitButton.setAttribute("disabled", "disabled");
        submitButton.style.cursor = "not-allowed";
    }
}

function validatePassword() {
    var passwordInput = document.getElementById("password");
    var passwordErrorLabel = document.getElementById("password-error");

    // Get the submit button
    var submitButton = document.querySelector("form button[type='submit']");

    // Clear previous error state
    passwordInput.classList.remove("error-box");
    passwordErrorLabel.textContent = "";
    passwordErrorLabel.style.display = "none";

    submitButton.removeAttribute("disabled");
    submitButton.style.cursor = "pointer";

    // Trim and get the password value
    var passwordValue = (passwordInput.value || '').trim();

    // Check if the password is empty or doesn't meet the requirements
    if (passwordValue === "" || passwordValue.length < 8 || !/[A-Z]/.test(passwordValue) || !/[a-z]/.test(passwordValue) || !/\d/.test(passwordValue)) {
        // Set error state
        passwordInput.classList.add("error-box");
        passwordErrorLabel.textContent = "La password deve contenere almeno un numero, una lettera maiuscola e deve essere lunga almeno 8 caratteri.";
        passwordErrorLabel.style.display = "block";
        submitButton.setAttribute("disabled", "disabled");
        submitButton.style.cursor = "not-allowed";
    }
    // No need for an explicit return; the function will exit naturally
}
