<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My First PHP Website</title>
    <link rel="stylesheet" href="style.css">
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to MyEvents</h1>
            <p>Your one-stop solution for managing college, family, birthday, and seminar events!</p>
            <a href="services.php" class="btn">Explore Events</a>
        </div>
    </section>

    <!-- Event Categories -->
    <section class="categories">
        <h2>Our Event Categories</h2>
        <div class="card-container">
            <div class="card">
                <h3>🎓 College Events</h3>
                <p>Festivals, cultural programs, sports, tech fests, and more.</p>
            </div>
            <div class="card">
                <h3>👨‍👩‍👧 Family Events</h3>
                <p>Anniversaries, get-togethers, family functions.</p>
            </div>
            <div class="card">
                <h3>🎂 Birthday Parties</h3>
                <p>Make birthdays memorable with our planning and decoration services.</p>
            </div>
            <div class="card">
                <h3>🎤 Seminars & Conferences</h3>
                <p>Professional management of workshops, talks, and training sessions.</p>
            </div>
        </div>
    </section>
    <!-- Features Section -->
     <!-- Features Section -->
<section class="features">
    <h2>Why Choose Event Manager?</h2>
    <div class="feature-grid">
        <div class="feature-box">
            <h4>📅 Easy Event Booking</h4>
            <p>Schedule and book college, family, or corporate events in a few clicks.</p>
        </div>
        <div class="feature-box">
            <h4>🎨 Creative Planning</h4>
            <p>Our team designs unique themes, stage setups, and decorations tailored to you.</p>
        </div>
        <div class="feature-box">
            <h4>💰 Transparent Pricing</h4>
            <p>Clear cost breakdowns and budget-friendly event packages with no hidden charges.</p>
        </div>
        <div class="feature-box">
            <h4>🤝 Dedicated Support</h4>
            <p>Our event managers are available 24/7 for smooth coordination and assistance.</p>
        </div>
    </div>
</section>


    <footer>
        <p>MyEvents &copy; <?php echo date("Y"); ?></p>
      
    </footer>
</body>
</html>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    /* ===== Global Reset ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Poppins", Arial, sans-serif;
    background: #f5f7fa;
    color: #333;
    line-height: 1.6;
}

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

/* ===== Hero Section ===== */
.hero {
    background: url('https://source.unsplash.com/1600x600/?celebration,stage,party') no-repeat center center/cover;
    height: 90vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
}
.hero::after {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.55);
}
.hero-content {
    position: relative;
    z-index: 1;
    color: #fff;
    max-width: 700px;
    padding: 20px;
    animation: fadeIn 1.5s ease-in-out;
}
.hero h1 {
    font-size: 50px;
    margin-bottom: 15px;
    font-weight: 700;
}
.hero p {
    font-size: 20px;
    margin-bottom: 25px;
}
.hero .btn {
    background: #ffd700;
    color: #333;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s ease;
}
.hero .btn:hover {
    background: #ffb700;
    transform: scale(1.1);
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== Categories Section ===== */
.categories {
    padding: 60px 20px;
    text-align: center;
    background: #fff;
}
.categories h2 {
    font-size: 32px;
    margin-bottom: 40px;
    font-weight: 700;
    color: #1a1a1a;
}
.card-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 25px;
}
.card {
    background: #fff;
    padding: 25px;
    width: 400px;
    height: 180px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    transition: 0.4s ease;
    cursor: pointer;
}
.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}
.card h3 {
    margin-bottom: 12px;
    font-size: 20px;
    color: #1a73e8;
}
.card p {
    font-size: 14px;
    color: #555;
}

/* ===== Features Section ===== */
.features {
    padding: 60px 20px;
    background: #f0f4ff;
    text-align: center;
}
.features h2 {
    font-size: 30px;
    margin-bottom: 35px;
    font-weight: 700;
    color: #222;
}
.feature-grid {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
}
.feature-box {
    background: #fff;
    padding: 25px;
    width: 230px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: 0.4s ease;
    align-items: center;
    text-align: center; 
}
.feature-box:hover {
    transform: translateY(-6px);
}
.feature-box h4 {
    color: #0a58ca;
    margin-bottom: 10px;
}

/* ===== Footer ===== */
footer {
    background: #1a73e8;
    color: #fff;
    text-align: left;
    padding: 15px;
    font-size: 14px;
}

</style>