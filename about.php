<?php
// about.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 
   
</head>
<body>
    <header>
        <h1>MyEvents</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
             <a href="services.php" class=""><i class="fas fa-calendar-alt"></i> Events</a> 
             <a href="login.php" class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</a>
        </nav>
    </header>

    <main><section class="about-hero">
    <h1>About Us</h1>
</section>

<section class="about-section">
    <h2>Who We Are</h2>
    <p>We are a professional Event Management platform specializing in college fests, family celebrations, birthdays, and seminars. Our mission is to bring people together through unforgettable events.</p>
</section>

<section class="mission-vision">
    <div class="mission-box">
        <h3>🎯 Our Mission</h3>
        <p>To simplify event planning with transparency, creativity, and efficiency.</p>
    </div>
    <div class="mission-box">
        <h3>🌍 Our Vision</h3>
        <p>To be the most trusted platform for managing all types of events globally.</p>
    </div>
</section>

<section class="team">
    <h2>Meet Our Team</h2>
    <div class="team-container">
        <div class="team-card">
            <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="Team Member">
            <h4>Praveen H K</h4>
            <p>Event Planner</p>
        </div>
        <div class="team-card">
            <img src="https://tse4.mm.bing.net/th/id/OIP.WpnGIPj1DKAGo-CP64znTwHaHa?r=0&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Team Member">
            <h4>Parvin</h4>
            <p>Coordinator</p>
        </div>
        <div class="team-card">
            <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_640.png" alt="Team Member">
            <h4>Arun M H</h4>
            <p>Technical Lead</p>
        </div>
    </div>
</section>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Website</p>
    </footer>
</body>
</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    /* General reset */
    /* Reset *//* ===== Reset & Base ===== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Poppins", Arial, sans-serif;
    background: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

/* ===== Hero Banner ===== */
.about-hero {
    background: url('https://source.unsplash.com/1600x500/?team,event,planning') no-repeat center center/cover;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    text-align: center;
    color: #fff;
}
.about-hero::after {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.55);
}
.about-hero h1 {
    position: relative;
    z-index: 1;
    font-size: 42px;
    font-weight: 700;
    animation: fadeIn 1.5s ease;
}

/* Animation */
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
}

/* ===== About Content ===== */
.about-section {
    max-width: 1000px;
    margin: 50px auto;
    padding: 0 20px;
    text-align: center;
}
.about-section h2 {
    font-size: 30px;
    margin-bottom: 20px;
    color: #1a73e8;
}
.about-section p {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
}

/* ===== Mission & Vision ===== */
.mission-vision {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
    margin: 60px auto;
    max-width: 1000px;
    padding: 0 20px;
}
.mission-box {
    background: #fff;
    padding: 25px;
    flex: 1 1 300px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    transition: 0.3s ease;
    text-align: center;
}
.mission-box:hover {
    transform: translateY(-6px);
}
.mission-box h3 {
    margin-bottom: 15px;
    font-size: 22px;
    color: #0a58ca;
}
.mission-box p {
    color: #666;
    font-size: 15px;
}

/* ===== Team Section ===== */
.team {
    background: #f0f4ff;
    padding: 60px 20px;
    text-align: center;
}
.team h2 {
    font-size: 28px;
    margin-bottom: 40px;
    color: #222;
}
.team-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 25px;
}
.team-card {
    background: #fff;
    padding: 20px;
    width: 220px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: 0.3s ease;
}
.team-card:hover {
    transform: translateY(-8px);
}
.team-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 15px;
}
.team-card h4 {
    font-size: 18px;
    margin-bottom: 6px;
    color: #1a73e8;
}
.team-card p {
    font-size: 14px;
    color: #666;
}

/* ===== Footer ===== */
footer {
    background: #1a73e8;
    color: #fff;
    text-align: center;
    padding: 15px;
    margin-top: 50px;
    font-size: 14px;
}
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
/* ===== Footer ===== */
footer {
    align-items: none;
    background: #1a73e8;
    color: #fff;
    text-align: center;
    padding: 15px;
    margin-top: 40px;
    font-size: 14px;
}
