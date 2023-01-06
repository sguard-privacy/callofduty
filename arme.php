<?php
require_once 'inc/log_bdd.php';
require_once 'inc/fonction.php';

// Récupération du arme par son ID
if ( isset($_GET['id_arme'])) {

  $arme = $pdoCOD->prepare(" SELECT * FROM arme WHERE id_arme AND id_arme = :id_arme ");
  $arme->execute(array(
    ':id_arme' => $_GET['id_arme']
  ));
  // debug($annonce->rowCount());
if ($arme->rowCount() == 0) { // si le rowCount est égal à 0 c'est qu'il n'y a pas d'arme
  header('location:index.php');// redirection vers la page de départ
  exit();// arrêt du script
  }
  $detail = $arme->fetch(PDO::FETCH_ASSOC);//je passe les infos dans une variable

  } else {
  header('location:marche.php');// si j'arrive sur la page sans rien dans l'url
  exit();// arrêt du script  
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $detail['Nom']; ?></title>
        <!-- Favicon-->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/arme.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="marche.php">Marché Noir</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="<?php echo $detail['Photo']; ?>" alt="Photo de l'arme" /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light"><?php echo $detail['Nom']; ?></h1>
                    <?php If(estConnecte()){ ?>
                    <a class="btn btn-primary" href="#">Acheter l'arme</a>
                    <?php } else { ?>

                    <div class=«alert alert-danger»>Connectez-vous pour acheter une arme ! </div>
                    <a class="btn btn-info" href="connexion.php">Connexion</a>

                    <?php } ?>
                    <h3 class="text-center"><?php echo $detail['prix']; ?> €</h3>
                </div>
            </div>
            <!-- Call to Action-->
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><h2 class="text-white m-0">Cette arme est dans la catégorie de <?php echo $detail['categorie']; ?></h2></div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Temps de Rechargement</h2>
                            <p class="card-text"><?php echo $detail['Rechargement']; ?> secondes</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Pénétration</h2>
                            <p class="card-text">Taux de pénétration <?php echo $detail['Penetration']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Cadence de Tir</h2>
                            <p class="card-text">Cadence en <?php echo $detail['Cadence']; ?> ms</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
