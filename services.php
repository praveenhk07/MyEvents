<?php
// services.php

// Array of services (future / offered)
$services = [
    [
        "title" => "Wedding Planning",
        "description" => "Complete wedding event planning including venue, decoration, catering, and entertainment.",
        "icon" => "💍"
    ],
    [
        "title" => "Corporate Events",
        "description" => "Professional management of conferences, meetings, and corporate parties.",
        "icon" => "🏢"
    ],
    [
        "title" => "Birthday Parties",
        "description" => "Fun-filled birthday party arrangements with themes, cake, and entertainment.",
        "icon" => "🎂"
    ],
    [
        "title" => "Concerts & Shows",
        "description" => "Organizing large scale music concerts, shows, and live performances.",
        "icon" => "🎤"
    ],
    [
        "title" => "Cultural Festivals",
        "description" => "Managing community gatherings, cultural programs, and traditional festivals.",
        "icon" => "🎭"
    ],
    [
        "title" => "Exhibitions & Trade Fairs",
        "description" => "Arrangements for expos, trade fairs, and exhibitions with stall management.",
        "icon" => "🛍️"
    ]
];

// Array of past events (examples of completed work)
$past_events = [
    [
        "name" => "Royal Wedding 2023",
        "details" => "A grand wedding event with 500+ guests, destination decor, catering, and live music.",
        "image" => "https://tse1.explicit.bing.net/th/id/OIP.Uf_UR2DuYNx78tNVFT7kmQHaEw?r=0&rs=1&pid=ImgDetMain&o=7&rm=3"
    ],
    [
        "name" => "Tech Conference 2024",
        "details" => "Organized a corporate tech summit with 2000+ attendees and 50+ speakers.",
        "image" => "https://static.vecteezy.com/system/resources/thumbnails/030/605/217/small_2x/conference-hall-audience-full-of-tech-people-tech-business-consept-generative-ai-free-photo.jpeg"
    ],
    [
        "name" => "College Cultural Fest",
        "details" => "Handled stage setup, artist management, food stalls, and security for 3-day college fest.",
        "image" => "https://th.bing.com/th/id/OIP.AGsTHKVnOsKbicRVP9g87QHaER?r=0&o=7rm=3&rs=1&pid=ImgDetMain&o=7&rm=3"
    ],
    [
        "name" => "Music Concert Night",
        "details" => "Rock concert with 10k+ crowd, stage lighting, sound systems, and VIP lounge.",
        "image" => "https://tse1.explicit.bing.net/th/id/OIP.BdU0xC52IfjngItQyIlFjgHaE8?r=0&rs=1&pid=ImgDetMain&o=7&rm=3"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services & Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .section {
            text-align: center;
            padding: 50px 20px;
        }
        .section h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .service-box, .event-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 15px;
            display: inline-block;
            width: 250px;
            vertical-align: top;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .service-box:hover, .event-box:hover {
            transform: translateY(-10px);
        }
        .service-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }
        .service-title {
            font-size: 1.3em;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .service-description, .event-details {
            font-size: 0.95em;
            color: #666;
        }
        .event-img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .event-name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
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
footer {
    background: #1a73e8;
    color: #fff;
    text-align: left;
    padding: 15px;
    font-size: 14px;
}


    </style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<body>
     <header>
       <h1>MyEvents</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="services.php" class=" "><i class="fas fa-calendar-alt"></i> Events</a> 
            <a href="login.php" class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</a>

        </nav>

    </header>
    <!-- Services Section -->
    <section class="section">
        <h1>Our Services</h1>
        <?php foreach ($services as $service): ?>
            <div class="service-box">
                <div class="service-icon"><?= $service['icon']; ?></div>
                <div class="service-title"><?= $service['title']; ?></div>
                <div class="service-description"><?= $service['description']; ?></div>
            </div>
        <?php endforeach; ?>
    </section>

    <!-- Past Events Section -->
    <section class="section" style="background:#eee;">
        <h1>Our Past Events</h1>
        <?php foreach ($past_events as $event): ?>
            <div class="event-box">
                <img src="<?= $event['image']; ?>" alt="<?= $event['name']; ?>" class="event-img">
                <div class="event-name"><?= $event['name']; ?></div>
                <div class="event-details"><?= $event['details']; ?></div>
            </div>
        <?php endforeach; ?>
    </section>
     <footer>
        <p>MyEvents &copy; <?php echo date("Y"); ?></p>
      
    </footer>

</body>
</html>
