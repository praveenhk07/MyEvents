<?php
// login.php
session_start();
// Ensure this sets up $conn
require_once "db_connect.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare SQL query to fetch customer by username
    $sql = "SELECT id, full_name, password FROM users WHERE username = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['username']  = $username;
            $_SESSION['role']      = 'customer';

            header("Location: welcome.php");
            exit();
        } else {
            $error = "❌ Incorrect password!";
        }
    } else {
        $error = "❌ No customer account found with that username!";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Home Button Above Login Card -->
    <div class="home-link">
        <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>
    </div>

    <main>
        <h2>Sign In</h2>
        <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post" action="login.php">
            <label>Username:<br><input type="text" name="username" required></label>
            <label>Password:<input type="password" name="password" required></label>
            <button type="submit">Login</button>
            <br>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </main>

</body>
</html>

<style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Roboto", "Segoe UI", Arial, sans-serif;
}

body {
    background: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

/* Login Card */
main {
    background: #fff;
    padding: 40px 45px;
    border-radius: 8px;
    box-shadow: 0px 4px 16px rgba(0,0,0,0.08);
    width: 360px;
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
    font-size: 20px;
    color: #000;
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

/* Login Button */
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

/* Error message */
p.error {
    margin-bottom: 15px;
    font-size: 14px;
    padding: 10px;
    border-radius: 4px;
    background: #fce8e6;
    color: #d93025;
    border: 1px solid #f5c6c4;
    text-align: center;
}

/* Footer */
footer {
    margin-top: 15px;
    text-align: center;
    font-size: 13px;
    color: #666;
}

footer a {
    color: #1a73e8;
    text-decoration: none;
}

footer a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 480px) {
    main {
        width: 90%;
        padding: 25px 20px;
    }
}

/* Home link above card */
.home-link {
    position: absolute;
    top: 20px;
    left: 20px;
}

.home-link a {
    display: flex;
    align-items: center;
    gap: 6px;
    background: #1a73e8;
    color: #fff;
    padding: 8px 14px;
    border-radius: 25px;
    font-weight: 500;
    text-decoration: none;
    transition: 0.3s ease;
}

.home-link a:hover {
    background: #1559b0;
    transform: scale(1.05);
}
</style>