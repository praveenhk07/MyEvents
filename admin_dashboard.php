<?php
// admin_dashboard.php
session_start();
require "db_connect.php"; // DB connection file

// Check if admin is logged in


// Approve / Reject booking
if (isset($_GET['action']) && isset($_GET['booking_id'])) {
    $action = $_GET['action'];
    $booking_id = intval($_GET['booking_id']);
    
    if (in_array($action, ['Approved', 'Rejected'])) {
        $stmt = $conn->prepare("UPDATE booked_events SET status=? WHERE id=?");
        $stmt->bind_param("si", $action, $booking_id);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: admin_dashboard.php"); // Refresh page
    exit();
}

// Fetch all users
$users = $conn->query("SELECT id, full_name, username, email, contact, role, created_at FROM users");

// Fetch all bookings
$bookings = $conn->query("
    SELECT b.id, b.event_type, b.event_date, b.start_time, b.end_time, b.location, 
           b.guests, b.budget, b.status, u.full_name AS customer 
    FROM booked_events b
    JOIN users u ON b.user_id = u.id
    ORDER BY b.event_date DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - MyEvents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fa; margin:0; }
        header {
            background: linear-gradient(90deg, #1a73e8, #0a58ca);
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 { margin: 0; }
        nav a { color: #fff; margin-left: 20px; text-decoration: none; }
        nav a:hover { color: #ffd700; }
        .container { max-width: 1200px; margin: 30px auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #1a73e8; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #1a73e8; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .btn { padding: 6px 12px; border: none; border-radius: 6px; cursor: pointer; }
        .approve { background: #28a745; color: white; }
        .reject { background: #dc3545; color: white; }
        .pending { background: #ffc107; color: black; padding: 4px 10px; border-radius: 5px; }
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard - MyEvents</h1>
    <nav>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Role</th>
            <th>Joined</th>
        </tr>
        <?php while ($row = $users->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= htmlspecialchars($row['full_name']); ?></td>
            <td><?= htmlspecialchars($row['username']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['contact']); ?></td>
            <td><?= htmlspecialchars($row['role']); ?></td>
            <td><?= $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>User Bookings</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Event Type</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>Guests</th>
            <th>Budget</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $bookings->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= htmlspecialchars($row['customer']); ?></td>
            <td><?= htmlspecialchars($row['event_type']); ?></td>
            <td><?= $row['event_date']; ?></td>
            <td><?= $row['start_time'] . " - " . $row['end_time']; ?></td>
            <td><?= htmlspecialchars($row['location']); ?></td>
            <td><?= $row['guests']; ?></td>
            <td><?= $row['budget']; ?></td>
            <td>
                <?php if ($row['status'] == 'Pending'): ?>
                    <span class="pending">Pending</span>
                <?php else: ?>
                    <?= $row['status']; ?>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($row['status'] == 'Pending'): ?>
                    <a href="admin_dashboard.php?action=Approved&booking_id=<?= $row['id']; ?>" class="btn approve">Approve</a>
                    <a href="admin_dashboard.php?action=Rejected&booking_id=<?= $row['id']; ?>" class="btn reject">Reject</a>
                <?php else: ?>
                    <?= $row['status']; ?>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
