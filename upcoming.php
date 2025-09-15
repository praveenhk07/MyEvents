<?php
// upcoming_events.php
session_start();

// Demo events (replace with DB data later)
$upcoming_events = [
    ["name" => "College Tech Fest", "date" => "2025-09-25"],
    ["name" => "Wedding Ceremony", "date" => "2025-10-10"],
    ["name" => "Corporate Seminar", "date" => "2025-10-15"],
    ["name" => "Birthday Bash", "date" => "2025-11-02"],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upcoming Events - MyEvents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f9f9f9;
        }
        header {
            background: linear-gradient(90deg, #1a73e8, #0a58ca);
            color: #fff;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            font-size: 22px;
            font-weight: bold;
        }
        nav a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
            font-weight: 500;
        }
        nav a:hover {
            color: #ffd700;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .container h2 {
            margin-bottom: 20px;
            color: #1a73e8;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 12px 15px;
            margin-bottom: 10px;
            background: #f4f7ff;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            color: #333;
        }
        li span {
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

<div class="container">
    <h2>📅 Booked Events</h2>
    <ul>
        <?php foreach ($upcoming_events as $event): ?>
            <li>
                <?php echo $event['name']; ?>
                <span><?php echo $event['date']; ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<footer>
    <p>MyEvents &copy; <?php echo date("Y"); ?> | All Rights Reserved</p>
</footer>

</body>
</html>
