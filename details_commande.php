<?php
session_start(); 
if(!isset($_SESSION['admin'])){
   header('location:404.php ');
   }

   // Inclure la configuration de la base de données
include_once 'config.php';

// Initialiser les erreurs
$error = '';
$commandes = [];

if ($conn) {
    if (isset($_GET['nomclient'])) {
        $nomclient = mysqli_real_escape_string($conn, $_GET['nomclient']);
        $sql = "SELECT * FROM commande WHERE nomclient = '$nomclient'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $commandes[] = $row;
            }
        } else {
            $error = "Erreur lors de la récupération des détails de la commande : " . mysqli_error($conn);
        }
    } else {
        $error = "Nom de client non spécifié.";
    }
} else {
    $error = "Erreur de connexion à la base de données.";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitClub - Commandes</title>

    <!-- Liens CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
        <h1 class="mt-5 mb-4">Détails de la Commande</h1>

<?php if ($error): ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
    </div>
<?php elseif ($commandes): ?>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Client: <?php echo htmlspecialchars($commandes[0]['nomclient'], ENT_QUOTES, 'UTF-8'); ?></h5>
            <p class="card-text">Téléphone: <?php echo htmlspecialchars($commandes[0]['telephone'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="card-text">Wilaya: <?php echo htmlspecialchars($commandes[0]['wilaya'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="card-text">Adresse: <?php echo htmlspecialchars($commandes[0]['adresse'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="card-text">Prix Livraison: <?php echo number_format($commandes[0]['prix_livraison'], 2); ?> DZD</p>
            <p class="card-text">Prix Total: <?php echo number_format($commandes[0]['totale'], 2); ?> DZD</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Détails des Commandes</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID Commande</th>
                            <th>Quantité</th>
                            <th>Image</th>
                            <th>Prix commande</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($commandes as $commande): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($commande['id_commande'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($commande['quantite'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><img src="<?php echo htmlspecialchars($commande['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Image produit" class="img-thumbnail" style="width: 100px;"></td>
                                <td><?php echo number_format($commande['prix_commande'], 2); ?> DZD</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning">Aucune commande trouvée pour ce client.</div>
<?php endif; ?>
        </main>
    </section>

    <!-- Link JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>
