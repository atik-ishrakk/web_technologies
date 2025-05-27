

function validateUsername(input) {
    const error = document.getElementById("usernameError");
    if (input.value.length < 4) {
        error.innerText = "Username must be at least 4 characters.";
        return false
    } else {
        error.innerText = "";
        return true
    }
    
}

function validatePassword(input) {
    const error = document.querySelector("#passwordError");
    const pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{4,}$/;
    if (!pattern.test(input.value)) {
        error.innerText = "Password must include a letter, a number and a special character.";
        return false
    } else {
        error.innerText = "";
        return true
    }
}

function validateEmail(input) {
    const error = document.getElementById("emailError");
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!pattern.test(input.value)) {
        error.innerText = "Invalid email format.";
        return false
    } else {
        error.innerText = "";
        return true
    }
}

function validatePhone(input) {
    const error = document.getElementById("phoneError");
    const pattern = /^\+8801[3-9][0-9]{8}$/;
    if (!pattern.test(input.value)) {
        error.innerText = "Enter a valid Bangladeshi phone number.";
        return false

    } else {
        error.innerText = "";
        return true
    }
}

function validateDOB(input) {
    const error = document.getElementById("dobError");
    const dob = new Date(input.value);
    const today = new Date();
    if (dob >= today) {
        // alert("Date of birth cannot be in the future.");
        error.innerText = "Date of birth cannot be in the future."
        input.value = "";
        return false

    }

}

function validateNID(input) {
    const error = document.getElementById('nidError')
    if (input.value.length < 10 || input.value.length > 17) {
        error.innerText = "NID number should be between 10 to 17 digits."
        return false
    }
}

function validateYear(input) {
    const year = parseInt(input.value);
    const currentYear = new Date().getFullYear();
    if (year < 1900 || year > currentYear) {
        alert("Enter a valid manufacture year.");
        input.value = "";
        return false

    }
}

function validateInsuranceDate(input) {
    const error = document.getElementById('insuranceError');
    const expiry = new Date(input.value);
    const today = new Date();
    if (expiry <= today) {
        // alert("Insurance expiry must be a future date.");
        error.innerText = "Insurance expiry must be a future date."
        input.value = "";
        return false
    }
    
}

function validateForm() {
    const isValid =
        validateUsername(document.getElementById("username")) &&
        validatePassword(document.getElementById("password")) &&
        validateRole(document.getElementById("role")) &&
        validateEmail(document.getElementById("email")) && 
        validatePhone(document.getElementById("phoneNumber")) && 
        validateDOB(document.getElementById("dob")) &&
        validateNID(document.getElementById("idNumber")) && 
        validateYear(document.getElementById("year")) &&
        validateInsuranceDate(document.getElementById("insuranceExpiry"));

    if (!isValid) {
        alert("Please fix the errors before submitting.");
    }
    return isValid;
}