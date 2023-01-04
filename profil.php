<?php
require_once 'inc/log_bdd.php';
require_once 'inc/fonction.php'; 
if (estconnecte()){
  $id_membre = $_SESSION['membre']['id_membre'];
  // debug($_SESSION);
}

if (!estConnecte()) {
  header('location:connexion.php');
}
// if (!estConnecte()) { // accès à la page autorisé quand on est connecté
//   header('location:connexion.php');
// }

// 6 SUPPRESSION D'UN MEMBRE
// debug($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id_membre'])) {
  $resultat = $pdoLOG->prepare( " DELETE FROM membre WHERE id_membre = :id_membre " );

  $resultat->execute(array(
    ':id_membre' => $_GET['id_membre']
  ));

  if ($resultat->rowCount() == 0) {
    $contenu .= '<div class="alert alert-danger"> Erreur de suppression</div>';
  } else {
    $contenu .= '<div class="alert alert-success"> Votre compte a été supprimer</div>';
  }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Profil COD</title>
      <script src="https://kit.fontawesome.com/5ba36090d7.js" crossorigin="anonymous"></script>
      <!-- Favicon-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">  
      <!-- Bootstrap icons-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link href="css/style.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card border border-primary">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <!-- <img src="photos/toto.jpg" alt="" class="card-img"> -->
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['membre']['pseudo']; ?></h4>
                      <p class="text-secondary mb-1">Bienvenue sur votre compte</p>
                      <?php
                        if(estAdmin()) { // si le membre est 'admin' il n'a pas les mêmes accès qu'un membre 'client'
                        // echo '<a class="btn btn-info" href="' .RACINE_SITE. 'admin/accueil.php">Espace admin</a>';
                        // echo 'coucou';
                        }   
                      ?>
                      <a  class="btn btn-danger" href="?action=supprimer&id_membre=<?php echo $id_membre; ?>" onclick="return(confirm('Nous sommes désolés de vous voir partir, confirmez la suppression de votre compte.'))">Supprimez votre compte</a>
                     </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3 border border-primary">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Prénom Nom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['membre']['prenom'];  ?>
                    <?php echo $_SESSION['membre']['nom'];  ?>
                      
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mail</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['membre']['mail']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pseudo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['membre']['pseudo'];  ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['membre']['mobile'];  ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                      </div>
    <script type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>