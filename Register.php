<?php
session_start();
require_once "db_connect.php"; 

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $username  = trim($_POST['username']);
    $email     = trim($_POST['email']);
    $contact   = trim($_POST['contact']);
    $password  = trim($_POST['password']);
    $confirm   = trim($_POST['confirm_password']);
    $role      = 'customer'; // Fixed role

    if ($password !== $confirm) {
        $message = "❌ Passwords do not match!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (full_name, username, email, contact, password, role) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $full_name, $username, $email, $contact, $hashed_password, $role);

        if ($stmt->execute()) {
            $message = "✅ Registration successful! <a href='login.php'>Login here</a>";
        } else {
            $message = "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h2>Create an Account</h2>
        <?php if ($message) echo "<p style='color:red;'>$message</p>"; ?>

        <form method="post" action="register.php">
            <label>Full Name</label>
            <input type="text" name="full_name" required>

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Contact Number</label>
            <input type="text" name="contact" pattern="[0-9]{10}" placeholder="10-digit number" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Confirm Password</label>
            <input type="password" name="confirm_password" required>

            <button type="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </main>
</body>
</html>

<style>
    /* General reset */
    /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Roboto", "Segoe UI", Arial, sans-serif;
}

body {
    background: #f5f6fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

/* Card */
main {
    background: #fff;
    padding: 40px 45px;
    border-radius: 8px;
    box-shadow: 0px 4px 16px rgba(0,0,0,0.08);
    width: 420px;
    border: 1px solid #e0e0e0;
}

main h2 {
    margin-bottom: 25px;
    font-size: 22px;
    font-weight: 600;
    color: #222;
    text-align: center;
}

/* Labels */
form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
    font-size: 14px;
    color: #444;
}

/* Inputs */
form input {
    width: 100%;
    padding: 12px 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    font-size: 14px;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
}

form input:focus {
    border-color: #1a73e8;
    box-shadow: 0 0 4px rgba(26,115,232,0.3);
}

/* Button */
form button {
    width: 100%;
    padding: 12px;
    background: #1a73e8;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s ease;
}

form button:hover {
    background: #1559b0;
}

/* Error / Success Messages */
p {
    margin-bottom: 15px;
    font-size: 14px;
    padding: 10px;
    border-radius: 4px;
}

p.error {
    background: #fce8e6;
    color: #d93025;
    border: 1px solid #f5c6c4;
}

p.success {
    background: #e6f4ea;
    color: #188038;
    border: 1px solid #c8e6c9;
}

/* Responsive */
@media (max-width: 480px) {
    main {
        width: 10%;
        padding: 25px 20px;
    }
}
