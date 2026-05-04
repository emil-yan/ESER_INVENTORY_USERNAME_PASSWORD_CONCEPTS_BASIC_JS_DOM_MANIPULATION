
document.getElementById("registerForm").addEventListener("submit", function(e) {
    let password = document.getElementById("password").value;
    let error = "";

    // Log attempt to console (F12)
    console.log("Password attempt:", password);

    // Rule 1: Minimum length
    if (password.length < 8) {
        error = "Password must be at least 8 characters.";
    }

    // Rule 2: Only numbers
    else if (/^[0-9]+$/.test(password)) {
        error = "Password cannot be only numbers.";
    }

    // Rule 3: Must have uppercase AND lowercase
    else if (!( /[a-z]/.test(password) && /[A-Z]/.test(password) )) {
        error = "Password must include both uppercase and lowercase letters.";
    }

    if (error !== "") {
        e.preventDefault(); // STOP form submission
        document.getElementById("error").innerText = error;

        console.warn("Validation failed:", error);
    } else {
        console.log("Password accepted.");
    }
});
