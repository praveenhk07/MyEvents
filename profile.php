<?php
// profile.php
session_start();
require "db_connect.php"; // include your DB connection

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE users SET full_name=?, email=?, contact=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phone, $user_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch user data
$stmt = $conn->prepare("SELECT full_name, email, contact, role, created_at FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - MyEvents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f5f7fa;
        }
        header {
            background: linear-gradient(90deg, #1a73e8, #0a58ca);
            color: #fff;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 { font-size: 22px; font-weight: bold; }
        nav a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
            font-weight: 500;
        }
        nav a:hover { color: #ffd700; }

        .profile-container {
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }
        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }
        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #1a73e8;
        }
        .profile-header h2 {
            font-size: 26px;
            color: #1a73e8;
            margin: 0;
        }
        .profile-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .profile-details div {
            background: #f4f7ff;
            padding: 15px;
            border-radius: 10px;
        }
        .profile-details div span {
            font-weight: 600;
            color: #1a73e8;
        }
        form input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #1a73e8;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        button:hover {
            background: #0a58ca;
        }
        footer {
            background: #1a73e8;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<header>
    <h1>MyEvents</h1>
    <nav>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
</header>

<div class="profile-container">
    <div class="profile-header">
        <img src="https://via.placeholder.com/100" alt="Profile Picture">
        <h2><?php echo htmlspecialchars($user['full_name']); ?></h2>
    </div>

    <form method="POST">
        <div class="profile-details">
            <div>
                <strong>Name:</strong>
                <input type="text" name="name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
            </div>
            <div>
                <strong>Email:</strong>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div>
                <strong>Phone:</strong>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['contact']); ?>">
            </div>
            <div>
                <strong>Role:</strong> <span><?php echo htmlspecialchars($user['role']); ?></span>
            </div>
            <div>
                <strong>Joined On:</strong> <span><?php echo htmlspecialchars($user['created_at']); ?></span>
            </div>
        </div>
        <button type="submit">Update Profile</button>
    </form>
</div>

<footer>
    <p>MyEvents &copy; <?php echo date("Y"); ?> | User Profile</p>
</footer>

</body>
</html>
