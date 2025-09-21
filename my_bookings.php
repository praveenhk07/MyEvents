<?php
// mybookings.php
session_start();
require "db_connect.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch bookings from database
$stmt = $conn->prepare("SELECT event_type, event_date, start_time, end_time, location, guests, budget, status 
                        FROM booked_events 
                        WHERE user_id = ?
                        ORDER BY event_date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$bookings = [];
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}
$stmt->close();
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
        .status-rejected {
            color: #842029;
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
        <a href="book_event.php">Book Event</a>
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
        <?php if (!empty($bookings)): ?>
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?php echo htmlspecialchars($booking['event_type']); ?></td>
                <td><?php echo htmlspecialchars($booking['event_date']); ?></td>
                <td><?php echo htmlspecialchars($booking['start_time'] . " - " . $booking['end_time']); ?></td>
                <td><?php echo htmlspecialchars($booking['location']); ?></td>
                <td><?php echo htmlspecialchars($booking['guests']); ?></td>
                <td>₹<?php echo htmlspecialchars($booking['budget']); ?></td>
                <td class="status-<?php echo strtolower($booking['status']); ?>">
                    <?php echo htmlspecialchars($booking['status']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align:center; color:#777;">No bookings found</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<footer>
    <p>MyEvents &copy; <?php echo date("Y"); ?> | All Rights Reserved</p>
</footer>

</body>
</html>
