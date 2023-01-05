<?php

require_once 'inc/log_bdd.php';
require_once 'inc/fonction.php';

if ( isset($_GET['id_membre']) ) {// on demande le détail d'un membre
    // debug($_GET);
    $resultat = $pdoCOD->prepare( " SELECT * FROM membre WHERE id_membre = :id_membre " );
    $resultat->execute(array(
      ':id_membre' => $_GET['id_membre']// on associe le marqueur vide à l'id_employes
    ));
    // debug($resultat->rowCount());
      if ($resultat->rowCount() == 0) { // si le rowCount est égal à 0 c'est qu'il n'y a pas d'employé
          header('location:profil.php');// redirection vers la page de départ
          exit();// arrêtedu script
      }  
      $maj = $resultat->fetch(PDO::FETCH_ASSOC);//je passe les infos dans une variable
      // debug($maj);// ferme if isset accolade suivante
      } else {
      header('location:maj_profil.php');// si j'arrive sur la page sans rien dans l'url
      exit();// arrête du script
  }

    // MAJ d'un memere
    if ( !empty($_POST) ) {//not empty
    // debug($_POST);
  $_POST['prenom'] = htmlspecialchars($_POST['prenom']);// pour se prémunir des failles et des injections SQL
	$_POST['nom'] = htmlspecialchars($_POST['nom']);
	$_POST['mail'] = htmlspecialchars($_POST['mail']);
	$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
	$_POST['mobile'] = htmlspecialchars($_POST['mobile']);

	$resultat = $pdoCOD->prepare( " UPDATE membre SET prenom = :prenom, nom = :nom, pseudo = :pseudo, mail = :mail, mobile = :mobile WHERE id_membre = :id_membre " );// requete préparée avec des marqueurs

	$resultat->execute( array(
		':prenom' => $_POST['prenom'],
		':nom' => $_POST['nom'],
		':mail' => $_POST['mail'],
    ':pseudo' => $_POST['pseudo'],
		':mobile' => $_POST['mobile'],
		':id_membre' => $_GET['id_membre'],
	));

    if ($resultat) {
        $contenu .='<div class="alert alert-success">Vous avez mis à jour vos informations avec succès, déconnecter vous pour actualiser ! <br> <a href="connexion.php" class="btn btn-secondary">Retourner dans votre profil</a> ';
    } else {
        $contenu .='<div class="alert alert-danger">Erreur lors de la mise à jour !</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<?php require_once 'inc/navbar.php' ?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Mise à Jour de vos Informations</p>

                <form method="POST" action="" class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="nom">Nom</label>
                      <input type="text" id="nom" value="<?php echo $maj['nom']; ?>" name="nom" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="prenom">Prénom</label>  
                      <input type="text" id="prenom" value="<?php echo $maj['prenom']; ?>" name="prenom" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="pseudo">Pseudo</label>  
                      <input type="text" id="pseudo" value="<?php echo $maj['pseudo']; ?>" name="pseudo" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="mail">Adresse Mail</label>
                      <input type="email" id="mail" value="<?php echo $maj['mail']; ?>" name="mail" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="mobile">Telephone</label>
                      <input type="tel" id="mobile" value="<?php echo $maj['mobile']; ?>" name="mobile" class="form-control" />
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Mise à Jour</button>
                  </div>

                </form>

                <div class="alert alert-success">
                <a href="profil.php">Retour</a></div> 
                </div>

                <?php echo $contenu; debug($_POST); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once 'inc/footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>