<?php
// dashboard.php
session_start();

// Dummy login check for demo
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = "Praveen H K"; // replace with real login system
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard - MyEvents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <h1>MyEvents</h1>
        <nav>
          
            <a href="logout.php" class="login-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero small-hero">
        <div class="hero-content">
            <h1>Welcome, <?php echo $_SESSION['username']; ?> 🎉</h1>
            <p>Manage your events, bookings, and schedule from one place.</p>
        </div>
    </section>

    <!-- Dashboard Cards -->
    <section class="dashboard">
        <h2>Quick Actions</h2>
        <div class="card-container">
            <div class="card">
                <h3><i class="fas fa-calendar-alt"></i> Check For Schedule</h3>
                <p>Check all scheduled college, family, and seminar events.</p>
                <a href="upcoming.php" class="btn">View Schedule</a>
            </div>
            <div class="card">
                <h3><i class="fas fa-edit"></i> Book Event</h3>
                <p>Plan your birthday, wedding, or conference in a few clicks.</p>
                <a href="book_event.php" class="btn">Book Now</a>
            </div>
            <div class="card">
                <h3><i class="fas fa-clock"></i> My Bookings</h3>
                <p>See your previous & upcoming event reservations.</p>
                <a href="my_bookings.php" class="btn">View Bookings</a>
            </div>
            <div class="card">
                <h3><i class="fas fa-cog"></i> Profile</h3>
                <p>Manage your account details, password, and preferences.</p>
                <a href="profile.php" class="btn">Edit Profile</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>MyEvents &copy; <?php echo date("Y"); ?> | Customer Dashboard</p>
    </footer>

<style>
/* ===== Reuse Global CSS from index.php ===== */
body {
    font-family: "Poppins", sans-serif;
    background: #f5f7fa;
    margin: 0;
    padding: 0;
}

/* Smaller Hero for dashboard */
.small-hero {
    height: 40vh;
    background: linear-gradient(90deg,#1a73e8,#0a58ca);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-align: center;
}
.small-hero h1 {
    font-size: 36px;
}
.small-hero p {
    font-size: 18px;
    margin-top: 10px;
}

/* Dashboard Section */
.dashboard {
    padding: 50px 20px;
    text-align: center;
}
.dashboard h2 {
    font-size: 28px;
    margin-bottom: 40px;
    color: #222;
}

/* Dashboard Cards */
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
}
.card {
    background: #fff;
    padding: 25px;
    width: 280px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    transition: 0.4s ease;
    text-align: center;
}
.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}
.card h3 {
    font-size: 20px;
    margin-bottom: 15px;
    color: #1a73e8;
}
.card p {
    font-size: 14px;
    color: #555;
}
.card .btn {
    display: inline-block;
    margin-top: 12px;
    background: #1a73e8;
    color: #fff;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    transition: 0.3s;
}
.card .btn:hover {
    background: #0a58ca;
}

/* Footer */
footer {
    background: #1a73e8;
    color: #fff;
    padding: 15px;
    text-align: center;
    margin-top: 40px;
}
/* ===== Header/Navbar Styles for Dashboard ===== */
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

/* Logo (MyEvents) */
header h1 {
    font-size: 26px;
    font-weight: 700;
    letter-spacing: 1px;
    margin: 0;
    cursor: pointer;
}
header h1 span {
    color: #ffd700; /* golden highlight if needed */
}

/* Navbar links */
nav {
    display: flex;
    align-items: center;
}
nav a {
    color: #fff;
    margin: 0 12px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s ease;
    display: flex;
    align-items: center;
    gap: 6px;
}
nav a:hover {
    color: #ffd700;
}

/* Active/current page link */
nav a.active {
    border-bottom: 2px solid #ffd700;
    padding-bottom: 4px;
}

/* Logout button */
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

</style>
</body>
</html>
