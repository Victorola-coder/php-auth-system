<?php
// Include database configuration
include_once("../includes/db_config.php");

// Define variables and set to empty values
$usernameErr = $passwordErr = $emailErr = "";
$username = $password = $email = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    // If no errors, proceed with registration
    if (empty($usernameErr) && empty($passwordErr) && empty($emailErr)) {
        // Insert user into the database
        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

        if ($conn->query($query) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h1>Registration Form</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <span class="error"><?php echo $usernameErr; ?></span>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <span class="error"><?php echo $passwordErr; ?></span>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <span class="error"><?php echo $emailErr; ?></span>
        <br>

        <input type="submit" value="Register">
    </form>
    
</body>
</html>
