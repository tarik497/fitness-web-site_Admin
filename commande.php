<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION['admin'])) {
    header('location: 404.php');
    exit;
}

// Inclure la configuration de la base de données
include_once 'config.php';

// Initialiser les erreurs
$error = '';

if ($conn) {
    $sql = "SELECT nomclient, confirmation_date, id_commande FROM commande ORDER BY confirmation_date DESC";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        $error = "Erreur lors de la récupération des commandes : " . mysqli_error($conn);
    }
} else {
    $error = "Erreur de connexion à la base de données.";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitClub - Commandes</title>

    <!-- Liens CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">

    <!-- Style custom -->
    <style>
        table {
            width: 100%;
            margin-top: 20px;
        }

        table th,
        table td {
            text-align: left;
            padding: 8px;
        }

        .action-btns a {
            margin-right: 5px;
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

<!-- Section principale -->
<section class="home">
    <div class="toggle-sidebar">
        <i class='bx bx-menu'></i>
        <div class="text">FitClub</div>
    </div>

    <main>
        <div class="container">
            <h1 class="text-center">Liste des Commandes</h1>

            <?php if ($error) : ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php else : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom Client</th>
                            <th>Date de Commande</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $last_client_name = null; // Initialiser la variable pour stocker le dernier nom de client
                        while ($row = mysqli_fetch_assoc($result)) :
                            if ($last_client_name != $row['nomclient']) { // Vérifier si le nom du client est différent du dernier
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['nomclient'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($row['confirmation_date'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="action-btns">
                                        <a href='details_commande.php?nomclient=<?php echo urlencode($row['nomclient']); ?>' class='btn btn-primary'>Voir les détails</a>
                                        <a href='delete_commande.php?id_commande=<?php echo $row['id_commande']; ?>' class='btn btn-danger'>Supprimer</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            $last_client_name = $row['nomclient']; // Mettre à jour le dernier nom de client
                        endwhile;
                        ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </main>
</section>

<!-- Liens JavaScript -->
<script src="assets/js/main.js"></script>
</body>

</html>
