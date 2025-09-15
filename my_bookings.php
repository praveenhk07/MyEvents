<?php
// mybookings.php
session_start();

// Demo username
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "John Doe";
}

// Dummy bookings (replace with DB query later)
$bookings = [
    [
        "event_type" => "Wedding",
        "event_date" => "2025-10-20",
        "start_time" => "18:00",
        "end_time" => "23:00",
        "location" => "Royal Palace, Bangalore",
        "guests" => 250,
        "budget" => "2,00,000",
        "status" => "Confirmed"
    ],
    [
        "event_type" => "College Fest",
        "event_date" => "2025-11-10",
        "start_time" => "09:00",
        "end_time" => "18:00",
        "location" => "UVCE Campus",
        "guests" => 800,
        "budget" => "5,00,000",
        "status" => "Pending"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookings - MyEvents</title>
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
            box-shadow: 0 3px 6px rgba(0,0,0,0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        header h1 {
            font-size: 24px;
            font-weight: bold;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }
        nav a:hover {
            color: #ffd700;
        }
        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        .container h2 {
            margin-bottom: 20px;
            color: #1a73e8;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
        }
        th, td {
            padding: 14px 16px;
            text-align: left;
        }
        th {
            background: #1a73e8;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #f2f6ff;
        }
        .status-confirmed {
            color: #0f5132;
            font-weight: bold;
        }
        .status-pending {
            color: #664d03;
            font-weight: bold;
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
        
        <a href="logout.php" class="login-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
</header>

<div class="container">
    <h2>My Bookings</h2>
    <table>
        <tr>
            <th>Event</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>Guests</th>
            <th>Budget</th>
            <th>Status</th>
        </tr>
        <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?php echo $booking['event_type']; ?></td>
            <td><?php echo $booking['event_date']; ?></td>
            <td><?php echo $booking['start_time'] . " - " . $booking['end_time']; ?></td>
            <td><?php echo $booking['location']; ?></td>
            <td><?php echo $booking['guests']; ?></td>
            <td>₹<?php echo $booking['budget']; ?></td>
            <td class="status-<?php echo strtolower($booking['status']); ?>"><?php echo $booking['status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<footer>
    <p>MyEvents &copy; <?php echo date("Y"); ?> | All Rights Reserved</p>
</footer>

</body>
</html>
