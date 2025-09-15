<?php
// profile.php
session_start();

// Demo user data (replace with DB fetch later)
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "Praveen H K";
}

$user = [
    "name" => $_SESSION['username'],
    "email" => "praveenhkori07@gmail.com",
    "phone" => "+91 8884060972",
    "role" => "Customer",
    "joined" => "2025-07-15"
];
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
        <h2><?php echo $user['name']; ?></h2>
    </div>

    <div class="profile-details">
        <div><strong>Email:</strong> <span><?php echo $user['email']; ?></span></div>
        <div><strong>Phone:</strong> <span><?php echo $user['phone']; ?></span></div>
        <div><strong>Role:</strong> <span><?php echo $user['role']; ?></span></div>
        <div><strong>Joined On:</strong> <span><?php echo $user['joined']; ?></span></div>
    </div>
</div>

<footer>
    <p>MyEvents &copy; <?php echo date("Y"); ?> | User Profile</p>
</footer>

</body>
</html>
