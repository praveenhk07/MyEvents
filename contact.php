<?php
// contact.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact - My Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="services.php" class=""><i class="fas fa-calendar-alt"></i> Events</a> 
            <a href="login.php" class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</a>
        </nav>
    </header>

    <main>
        <h2>Contact Us</h2>
        <form method="post" action="contact.php">
            <label>Name: <input type="text" name="name" required placeholder="Your Full Name"></label>
            <label>Email: <input type="email" name="email" required placeholder="enter your email "></label>
            <label>Message:<br><textarea name="message" required ></textarea></label><br>
            <button type="submit">Send</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            echo "<p>Thank you, $name. We received your message:</p>";
            echo "<blockquote>$message</blockquote>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Website</p>
    </footer>
</body>
</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    /* ===== Reset & Base ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Poppins", Arial, sans-serif;
    background: #f4f7fb;
    color: #333;
    line-height: 1.6;
}

/* ===== Header ===== */
        /* ===== Navbar ===== */
header {
    background: linear-gradient(90deg, #1a73e8, #0a58ca);
    color: #fff;
    padding: 15px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 3px 6px rgba(0,0,0,0.2);
}
header .logo {
    font-size: 26px;
    font-weight: 700;
    letter-spacing: 1px;
}
header .logo span {
    color: #ffd700;
}
nav a {
    color: #fff;
    margin: 0 15px;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}
nav a:hover {
    color: #ffd700;
}
nav .login-btn {
    background: #ffd700;
    color: #1a1a1a;
    padding: 8px 16px;
    border-radius: 25px;
    font-weight: 600;
    transition: 0.3s ease;
}
nav .login-btn:hover {
    background: #ffb700;
    transform: scale(1.05);
}


/* ===== Main ===== */
main {
    max-width: 700px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

main h2 {
    text-align: center;
    font-size: 28px;
    margin-bottom: 25px;
    color: #1a73e8;
}

/* ===== Form ===== */
form {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

label {
    font-weight: 600;
    font-size: 15px;
    color: #333;
}

input, textarea {
    width: 100%;
    padding: 12px 15px;
    margin-top: 8px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.3s ease;
}

input:focus, textarea:focus {
    outline: none;
    border-color: #1a73e8;
    box-shadow: 0 0 6px rgba(26,115,232,0.3);
}

textarea {
    min-height: 120px;
    resize: vertical;
}

button {
    background: #1a73e8;
    color: #fff;
    padding: 12px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease;
}

button:hover {
    background: #0a58ca;
    transform: scale(1.05);
}

/* ===== Response Message ===== */
blockquote {
    background: #f0f4ff;
    border-left: 4px solid #1a73e8;
    padding: 12px 16px;
    margin-top: 20px;
    font-style: italic;
    border-radius: 6px;
}
footer {
    background: #1a73e8;
    color: #fff;
    text-align: left;
    padding: 15px;
    font-size: 14px;
}

</style>