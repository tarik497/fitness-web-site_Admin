<?php
session_start();

// Vérification de la session admin
if (!isset($_SESSION['admin'])) {
    header('location: 404.php'); 
    exit;
}

$conn = mysqli_connect("localhost","root","","fitness");

// Vérification de la connexion à la base de données
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fonction pour ajouter un administrateur
function addAdmin($conn) {
    if(isset($_POST['add_admin'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Requête pour insérer un nouvel admin
        $sql = "INSERT INTO admin (nom, email, password) VALUES ('$nom', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
         
        } else {
            echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Fonction pour supprimer un administrateur
function deleteAdmin($conn) {
    if(isset($_POST['delete_admin'])) {
        $admin_id = $_POST['admin_id'];

        // Requête pour supprimer un admin
        $sql = "DELETE FROM admin WHERE id = '$admin_id'";

        if (mysqli_query($conn, $sql)) {
           
        } else {
            echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Appel des fonctions d'ajout et de suppression d'administrateur
addAdmin($conn);
deleteAdmin($conn);

// Récupération de tous les administrateurs
$sql = "SELECT * FROM admin WHERE id_admin != 1";
$result = mysqli_query($conn, $sql);
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



  
    <style>
        /* Style pour les formulaires */
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        form h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .table-container01 {
            width: 60%; /* Utiliser toute la largeur disponible */
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden; /* Empêcher le contenu de dépasser les bords */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ajouter une ombre légère */
            padding: 10px;
            margin-left: 300px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        form button[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        form button[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td form {
            display: flex;
            justify-content: flex-end;
        }

        td form button {
            padding: 5px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        td form button:hover {
            background-color: #d32f2f;
        }
    </style>
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
    <!-- Formulaire d'ajout d'admin -->
    <form action="" method="POST">
        <h2>Ajouter un administrateur</h2>
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="add_admin">Ajouter</button>
    </form>
    <br>

    <!-- Liste des administrateurs -->
    <h2 style="margin-left: 500px;">Liste des administrateurs :</h2>
    <br>
    <div class="table-container01">
        <table>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            if (isset($result)) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nom'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td><form action='' method='POST' onsubmit='return confirm(\"Voulez-vous vraiment supprimer cet administrateur ?\")'><input type='hidden' name='admin_id' value='" . $row['id_admin'] . "'><button type='submit' name='delete_admin'><i class='bx bx-trash'></i></button></form></td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
    
    </main>
    </section>

    <!-- Link JS -->
    <script src="assets/js/main.js"></script>

 
    </script>
</body>

</html>