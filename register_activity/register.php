<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Backend validation
    if (strlen($password) < 8) {
        die("Error: Password must be at least 8 characters.");
    }

    if (preg_match('/^[0-9]+$/', $password)) {
        die("Error: Password cannot be only numbers.");
    }

    if (!(preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password))) {
        die("Error: Must include uppercase and lowercase letters.");
    }

    echo "Registration successful!";
}
?>