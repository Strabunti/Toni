function validateLogin() {
    if (!validateUsername()){
        return false;
    } else if (!validatePassword()){
        return false;
    }
    return true;
}

function validateUsername() {
    var usernameInput = document.getElementById("Username");
    if(usernameInput.value == null){
        return;
    }
    if(usernameInput.classList.contains("error-box")){
        usernameInput.classList.remove("error-box");
    }

    var usernameValue = usernameInput.value.trim();

    // Check if the username is empty
    if (usernameValue === "") {
        usernameInput.classList.add("error-box");
        return;
    }

    // Check for SQL injection attempts
    if (/[\;\-\-]/.test(usernameValue)) {
        usernameInput.classList.add("error-box");
        return;
    }

    // Check if the username exceeds 100 characters
    if (usernameValue.length > 100) {
        usernameInput.classList.add("error-box");
        return;
    }

    // Validation passed
}

function validatePassword() {
    var passwordInput = document.getElementById("Password");
    
    if(passwordInput.value == null){
        return;
    }

    if(passwordInput.classList.contains("error-box")){
        passwordInput.classList.remove("error-box");
    }

    var passwordValue = passwordInput.value.trim();

    // Check if the password is empty
    if (passwordValue === "") {
        passwordInput.classList.add("error-box");
        return;
    }

    // Check if the password meets the length requirement
    if (passwordValue.length < 8) {
        passwordInput.classList.add("error-box");
        return;
    }

    // Check if the password contains at least one uppercase letter
    if (!/[A-Z]/.test(passwordValue)) {
        passwordInput.classList.add("error-box");
        return;
    }

    // Check if the password contains at least one lowercase letter
    if (!/[a-z]/.test(passwordValue)) {
        passwordInput.classList.add("error-box");
        return;
    }

    // Check if the password contains at least one digit
    if (!/\d/.test(passwordValue)) {
        passwordInput.classList.add("error-box");
        return;
    }

    // Validation passed
}