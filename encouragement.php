<?php
session_start(); 
if(!isset($_SESSION['admin'])){
   header('location:404.php ');
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitClub</title>

    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="assets/img/img.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/encouragement.css">
</head>

<body>
<div class="sidebar close">
        <!-- ========== Logo ============  -->
        <a href="#" class="logo-box">
            <i class='bx bxl-xing'></i>
            <div class="logo-name">FitClub</div>
        </a>

        <!-- ========== List ============  -->
        <ul class="sidebar-list">
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="index.php" class="link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Dashboard</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="index.php" class="link submenu-title">Dashboard</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="allprogramme.php" class="link">
                        <i class='bx bx-collection'></i>
                        <span class="name">Programes</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Programes</a>
                    <a href="allprogramme.php" class="link">tous les Programes</a>
                    <a href="addprogramme.php" class="link">ajoutes Programes</a>
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="allnutrition.php" class="link">
                        <i class='bx bx-book-alt'></i>
                        <span class="name">Nutrition</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Nutrition</a>
                    <a href="allnutrition.php" class="link">tous les Nutrition</a>
                    <a href="addnutrition.php" class="link">ajoutes Nutrition</a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="allexercices.php" class="link">
                        <i class='bx bx-book-alt'></i>
                        <span class="name">Exercices</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Exercices</a>
                    <a href="allexercices.php" class="link">tous les Exercices</a>
                    <a href="addexercices.php" class="link">ajoutes Exercices</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="allcomplimentalimentaire.php" class="link">
                        <i class='bx bx-book-alt'></i>
                        <span class="name">Compliment Alimentaire</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Compliment Alimentaire</a>
                    <a href="allcomplimentalimentaire.php" class="link">tous les Compliment Alimentaire</a>
                    <a href="addcomplimentalimentaire.php" class="link">ajoutes Compliment Alimentaire</a>
                </div>
            </li>

            <li>
                <div class="title">
                    <a href="commande.php" class="link">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="name">Commandes</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="commande.php" class="link submenu-title">Commandes</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="encouragement.php" class="link">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="name">Encouragement</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="encouragement.php" class="link submenu-title">Encouragement</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="messages.php" class="link">
                        <i class='bx bx-envelope'></i>
                        <span class="name">Messages</span>
                    </a>
                </div>    
                <div class="submenu">
                    <a href="messages.php" class="link submenu-title">Messages</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="logout.php" class="link">
                        <i class='bx bx-compass'></i>
                        <span class="name">Deconnexion</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="logout.php" class="link submenu-title">Deconnexion</a>
                    <!-- submenu links here  -->
                </div>
            </li>
        </ul>
    </div>

    <!-- ============= Home Section =============== -->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text">FitClub</div>
        </div>
<main>
        <br>
<br> <br>
  <!-- Encouragement Content -->
  <div class="encouragement-container">
    <h1>Boost Your Workout with FitClup!</h1>
    <p>
      Welcome to FitClup, your dedicated fitness companion. We believe in the extraordinary power within you to transform your life through fitness. Every drop of sweat, every repetition, and every healthy choice you make brings you closer to a version of yourself you'll be proud of.
    </p>
    <p>
      At FitClup, we understand that the journey to a healthier you is more than just physical. It's a mental and emotional commitment to your well-being. Our community is here to support you through the highs and lows, celebrating your victories and providing encouragement when you need it most.
    </p>
    <p>
      Take a moment to visualize the stronger, fitter, and more confident you. Whether you're an experienced athlete or just starting, FitClup offers diverse training programs and nutritional guidance tailored to your unique goals. Your progress is our priority, and every step you take is a step towards a better you.
    </p>
    <p>
      Remember, fitness is not just a destination; it's a journey. Embrace the challenges, celebrate the small victories, and enjoy the process. FitClup is more than a fitness platform; it's a supportive community that believes in your potential. Let's make every workout count and turn your fitness dreams into reality!
    </p>
    <a href="#" class="btn btn-lg btn-light">Get Started</a>
  </div>
  </main>
    </section>

    <!-- Link JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>