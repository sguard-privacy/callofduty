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
    <div class="main-body">
    <?php require_once 'inc/navbar.php'; ?>
<section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="assets/img/avatar.jpeg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"> <?php echo $_SESSION['membre']['pseudo'];  ?></h5>
            <p class="text-muted mb-1">Bienvenue sur votre Compte Call of Duty</p>
            <div class="d-flex justify-content-center mb-2">
              <?php echo '<a class="btn btn-danger" href="' .RACINE_SITE. 'connexion.php?action=deconnexion">Déconnexion</a>'; ?>
            </div>
            <div class="d-flex justify-content-center mb-2">
            <a href="maj_profil.php?id_membre=<?php echo $_SESSION['membre']['id_membre'] ?>" class="btn btn-warning">Modifier vos informations</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Prénom et Nom</p>
              </div>
              <div class="col-sm-9">
              <?php echo $_SESSION['membre']['prenom'];  ?>
              <?php echo $_SESSION['membre']['nom'];  ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Pseudo</p>
              </div>
              <div class="col-sm-9">
              <?php echo $_SESSION['membre']['pseudo'];  ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Adresse Mail</p>
              </div>
              <div class="col-sm-9">
              <?php echo $_SESSION['membre']['mail'];  ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Numéro de Téléphone</p>
              </div>
              <div class="col-sm-9">
              <?php echo $_SESSION['membre']['mobile'];  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once 'inc/footer.php'; ?>
    <script type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>