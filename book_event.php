<?php
// book_event.php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "John Doe"; // demo user
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eventType = $_POST['event_type'];
    $eventDate = $_POST['event_date'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $budget = $_POST['budget'];
    $requirements = $_POST['requirements'];
    $catering = $_POST['catering'];
    $decoration = $_POST['decoration'];
    $message = $_POST['message'];

    // Save to database in real app
    $success = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Event - MyEvents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>MyEvents</h1>
    <nav>
        
        <a href="logout.php" class="login-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
</header>

<section class="hero small-hero">
    <div class="hero-content" style="text-align: center;">
        <h1>Book Your Event 🎉</h1>
        <p>Provide complete details to help us organize your event perfectly.</p>
     
    </div>
</section>

<section class="form-section">
    <?php if (!empty($success)): ?>
        <div class="success-message">✅ Your event request has been submitted. Our team will contact you soon!</div>
    <?php endif; ?>

    <form method="POST" class="booking-form">

        <!-- Basic Info -->
        <label for="event_type">Event Type</label>
        <select name="event_type" id="event_type" required>
            <option value="">-- Select Event --</option>
            <option value="College Event">🎓 College Event</option>
            <option value="Family Event">👨‍👩‍👧 Family Event</option>
            <option value="Birthday Party">🎂 Birthday Party</option>
            <option value="Wedding">💍 Wedding</option>
            <option value="Seminar/Conference">🎤 Seminar / Conference</option>
        </select>

        <label for="event_date">Event Date</label>
        <input type="date" name="event_date" id="event_date" required>

        <div class="time-grid">
            <div>
                <label for="start_time">Start Time</label>
                <input type="time" name="start_time" id="start_time" required>
            </div>
            <div>
                <label for="end_time">End Time</label>
                <input type="time" name="end_time" id="end_time" required>
            </div>
        </div>

        <!-- Location & Guests -->
        <label for="location">Event Location</label>
        <input type="text" name="location" id="location" placeholder="Enter full address" required>

        <label for="guests">Number of Attendees</label>
        <input type="number" name="guests" id="guests" placeholder="e.g. 200" required>

        <label for="budget">Estimated Budget (₹)</label>
        <input type="number" name="budget" id="budget" placeholder="Enter budget range" required>

        <!-- Services -->
        <label for="requirements">Special Requirements</label>
        <textarea name="requirements" id="requirements" rows="3" placeholder="Stage setup, audio system, photographers, etc."></textarea>

        <label for="catering">Catering Required?</label>
        <select name="catering" id="catering">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <label for="decoration">Decoration Theme</label>
        <select name="decoration" id="decoration">
            <option value="Classic">Classic</option>
            <option value="Modern">Modern</option>
            <option value="Traditional">Traditional</option>
            <option value="Custom">Custom</option>
        </select>

        <!-- Extra Notes -->
        <label for="message">Additional Notes</label>
        <textarea name="message" id="message" rows="4" placeholder="Any other instructions..."></textarea>

        <button type="submit" class="btn-submit">Submit Booking</button>
    </form>
</section>

<footer>
    <p>MyEvents &copy; <?php echo date("Y"); ?> | Event Booking</p>
</footer>

<style>
/* ==== Modernized Booking Form UI ==== */
.form-section {
    max-width: 750px;
    margin: 50px auto;
    padding: 40px;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: 0.3s ease;
}
.form-section:hover {
    transform: translateY(-3px);
}

/* Grid for better spacing */
.booking-form {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

/* Labels */
.booking-form label {
    font-weight: 600;
    margin-bottom: 6px;
    color: #333;
    font-size: 14px;
}

/* Inputs, Selects, Textareas */
.booking-form input,
.booking-form select,
.booking-form textarea {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    font-size: 15px;
    transition: 0.3s ease;
    background: #f9f9f9;
}
.booking-form input:focus,
.booking-form select:focus,
.booking-form textarea:focus {
    border-color: #1a73e8;
    background: #fff;
    box-shadow: 0 0 6px rgba(26,115,232,0.3);
}

/* Time inputs in 2 columns */
.time-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

/* Submit Button */
.btn-submit {
    margin-top: 10px;
    background: linear-gradient(90deg, #1a73e8, #0a58ca);
    color: #fff;
    padding: 14px;
    border: none;
    border-radius: 30px;
    font-size: 16px;
    cursor: pointer;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}
.btn-submit:hover {
    background: linear-gradient(90deg, #0a58ca, #0041a8);
    transform: translateY(-2px);
}

/* Success Message */
.success-message {
    background: #e6f9f0;
    color: #0f5132;
    padding: 14px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: 600;
    border: 1px solid #badbcc;
}
/* ==== Modernized Booking Form UI ==== */
.form-section {
    max-width: 750px;
    margin: 50px auto;
    padding: 40px;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: 0.3s ease;
}
.form-section:hover {
    transform: translateY(-3px);
}

/* Grid for better spacing */
.booking-form {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

/* Labels */
.booking-form label {
    font-weight: 600;
    margin-bottom: 6px;
    color: #333;
    font-size: 14px;
}

/* Inputs, Selects, Textareas */
.booking-form input,
.booking-form select,
.booking-form textarea {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    font-size: 15px;
    transition: 0.3s ease;
    background: #f9f9f9;
}
.booking-form input:focus,
.booking-form select:focus,
.booking-form textarea:focus {
    border-color: #1a73e8;
    background: #fff;
    box-shadow: 0 0 6px rgba(26,115,232,0.3);
}

/* Time inputs in 2 columns */
.time-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

/* Submit Button */
.btn-submit {
    margin-top: 10px;
    background: linear-gradient(90deg, #1a73e8, #0a58ca);
    color: #fff;
    padding: 14px;
    border: none;
    border-radius: 30px;
    font-size: 16px;
    cursor: pointer;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}
.btn-submit:hover {
    background: linear-gradient(90deg, #0a58ca, #0041a8);
    transform: translateY(-2px);
}

/* Success Message */
.success-message {
    background: #e6f9f0;
    color: #0f5132;
    padding: 14px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: 600;
    border: 1px solid #badbcc;
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
/* ===== Footer ===== */
footer {   
    background: #1a73e8;
    color: #fff;
    text-align: center;
    padding: 15px;
    margin-top: 40px;
    font-size: 14px;
}

</style>

</body>
</html>
