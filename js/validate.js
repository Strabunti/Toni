function validateLogin() {
    if (!validateUsername()){
        return false;
    } else if (!validatePassword()){
        return false;
    }
    return true;
}

function validateUsername() {
    var usernameInput = document.getElementById("username");
    if(usernameInput.classList.contains("error")){
        usernameInput.classList.remove("error");
    }
    if(usernameInput.value == null || usernameInput.value == ""){
        alert("Username cannot be empty.");
        usernameInput.classList.add("error");
        return false;
    }

    var usernameValue = usernameInput.value.trim();
    var valid = true;

    // Check if the username is empty
    if (usernameValue === "") {
        alert("Username cannot be empty.");
        usernameInput.classList.add("error");
        return;
    }

    // Check for SQL injection attempts
    if (/[\;\-\-]/.test(usernameValue)) {
        alert("Invalid characters in username.");
        usernameInput.classList.add("error");
        return;
    }

    // Check if the username exceeds 100 characters
    if (usernameValue.length > 100) {
        alert("Username cannot exceed 100 characters.");
        usernameInput.classList.add("error");
        return;
    }

    // Validation passed
    alert("Username is valid.");
}

function validatePassword() {
    var passwordInput = document.getElementById("password");
    var passwordValue = passwordInput.value.trim();

    // Check if the password is empty
    if (passwordValue === "") {
        alert("Password cannot be empty.");
        passwordInput.classList.add("error");
        return;
    }

    // Check if the password meets the length requirement
    if (passwordValue.length < 8) {
        alert("Password must be at least 8 characters long.");
        passwordInput.classList.add("error");
        return;
    }

    // Check if the password contains at least one uppercase letter
    if (!/[A-Z]/.test(passwordValue)) {
        alert("Password must contain at least one uppercase letter.");
        passwordInput.classList.add("error");
        return;
    }

    // Check if the password contains at least one lowercase letter
    if (!/[a-z]/.test(passwordValue)) {
        alert("Password must contain at least one lowercase letter.");
        passwordInput.classList.add("error");
        return;
    }

    // Check if the password contains at least one digit
    if (!/\d/.test(passwordValue)) {
        alert("Password must contain at least one digit.");
        passwordInput.classList.add("error");
        return;
    }

    // Validation passed
    alert("Password is valid.");

    // You can add more validation logic or actions as needed
}