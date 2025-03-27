<?php

session_start();  
 if(!isset($_SESSION['admin'])){
    header('location:404.php ');
    }
    
  

error_reporting(E_ALL); 
ini_set('display_errors', 1);

include("config.php");



if(isset($_POST["Submit"])){
    $compliment_alimentaire_name = $_POST["compliment_alimentaire_name"];
    $prix = $_POST["prix"];
    $image = $_FILES["image"];
    $description= $_POST["description"];

    // Vérifiez si les champs ne sont pas vides
    if(!empty($compliment_alimentaire_name) && !empty($prix) && isset($_FILES["image"]["tmp_name"]) && isset($_FILES["image"]["name"])) {
        $image_location = $_FILES["image"]["tmp_name"];
        $image_name = $_FILES["image"]["name"];
        $image_up = "image/".$image_name; 
        
        // Préparez la requête SQL en utilisant des requêtes préparées pour éviter les injections SQL
        $insert = mysqli_prepare($conn, "INSERT INTO compliment_alimentaire (compliment_alimentaire_name, prix, image, description) VALUES(?, ?, ?, ?)");
        mysqli_stmt_bind_param($insert, "ssss", $compliment_alimentaire_name, $prix, $image_up, $description);

        if(mysqli_stmt_execute($insert) && move_uploaded_file($image_location, 'image/'.$image_name)) {
            echo "<script>alert('compliment_alimentaire téléchargé avec succès.');</script>";
        } else {
            echo "<script>alert('Un problème s’est produit pour que les compliment_alimentaires n’aient pas été téléchargés.');</script>";
        }
        mysqli_stmt_close($insert);
    } else {
        echo "<script>alert('Les informations du fichier vidéo sont manquantes.');</script>";
    }

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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/js/bootstrap.js">
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
            <div class="content-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Ajouter compliment alimentaire</h5>
                                </div>
                                <form action="addcomplimentalimentaire.php" method="post" enctype="multipart/form-data" class="p-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="compliment_alimentaire_name" class="form-label">Nom du compliment alimentaire</label>
                                                    <input type="text" class="form-control" id="compliment_alimentaire_name" name="compliment_alimentaire_name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="prix" class="form-label">prix</label>
                                                    <input class="form-control" rows="5" id="prix" name="prix" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">description</label>
                                                    <textarea class="form-control" rows="5" id="description" name="description" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Image</label>
                                                    <input type="file" class="form-control" id="image" name="image" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="submit" class="btn btn-primary" name="Submit">Ajouter</button>
                                                <button type="reset" class="btn btn-light">Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<!-- Bootstrap JS -->
<script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>


    <!-- Bootstrap JS -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
    

    </section>

    

    <!-- Link JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>