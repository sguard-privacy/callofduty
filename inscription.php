<?php

require_once 'inc/log_bdd.php';
require_once 'inc/fonction.php';

// redirection vers la page profil
if (estConnecte()) {
  header('location:profil.php');
  exit();
}

// debug($_SESSION);
if ( !empty($_POST) ) {
    //   debug($_POST);
    
      if ( !isset($_POST['prenom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 25) {
          // !isset n'est pas isset, .= concaténation puis affectation, || ou, strlen string length longueur chainbe de caractère
          $contenu .='<div class="alert alert-danger">Votre prénom doit faire entre 2 et 20 caractères</div>';
      }
      if ( !isset($_POST['nom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 25) {
          $contenu .='<div class="alert alert-danger">Votre nom de famille doit faire entre 2 et 20 caractères</div>';
      }
    
      if ( !isset($_POST['mail']) || strlen($_POST['mail']) > 50 || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
          // filter_var filtre une variable, et dans ce filtre on passe la constante prédéfinie (EN MAJUSCULE) qui vérifie que c'est bien au format email
          $contenu .='<div class="alert alert-danger">Votre email n\'est pas conforme !</div>';
      }
    
      if ( !isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) {
          $contenu .='<div class="alert alert-danger">Votre pseudo doit faire entre 4 et 20 caractères</div>';
      }
      if(isset($_POST['mdp']) && isset($_POST['confmdp'])) {
        if(empty($_POST['mdp'])) {
            $contenu='<div class="alert alert-danger">Le premier champ de mot de passe il est vide</div>';
        }
    
        if(sha1($_POST['mdp']) !== sha1($_POST['confmdp'])) {
           $contenu= '<div class="alert alert-danger">Les mots de passes ne sont pas identique !</div>';
        }
    }
    
      if ( !isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) {
          $contenu .='<div class="alert alert-danger">Votre mot de passe doit faire entre 4 et 20 caractères</div>';
      }
    
      if (empty($contenu)) {// si la variable est vide c'est qu'il n'y a aucune erreur dans $_POST
          $membre = executeRequete( " SELECT * FROM membre WHERE pseudo = :pseudo ", 
                                          array(':pseudo' => $_POST['pseudo']));
    
          if ($membre->rowCount() > 0) {
              $contenu .='<div class="alert alert-danger">Le pseudo est indisponible veuillez en choisir un autre !</div>';
          } else {
            
     
                
             
    
              $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT); //bcrypt
    
              $succes = executeRequete( " INSERT INTO membre (nom, prenom, pseudo, mail, mobile, mdp) VALUES (:nom, :prenom, :pseudo, :mail, :mobile, :mdp) ",
              array(
                  ':nom' => $_POST['nom'],
                  ':prenom' => $_POST['prenom'],
                  ':pseudo' => $_POST['pseudo'],
                  ':mail' => $_POST['mail'],
                  ':mobile' => $_POST['mobile'],
                  ':mdp' => $mdp,
              ));
              if ($succes) {
                $contenu .='<div class="alert alert-success">Préparer vous au combat, vous êtes inscrit sur Call of Duty Black Ops 3 ! <br>   <a href="connexion.php">Cliquez ici pour vous connecter</a></div>  ';
            } else {
                $contenu .='<div class="alert alert-danger">Erreur lors de l\'inscription !</div>';
              }
            }
          
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
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/marche.css">
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

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Inscription</p>

                <form method="POST" action="" class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="nom">Nom</label>
                      <input type="text" id="nom" name="nom" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="prenom">Prénom</label>  
                      <input type="text" id="prenom" name="prenom" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="pseudo">Pseudo</label>  
                      <input type="text" id="pseudo" name="pseudo" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="mail">Adresse Mail</label>
                      <input type="email" id="mail" name="mail" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="mobile">Telephone</label>
                      <input type="tel" id="mobile" name="mobile" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="mdp">Mot de Passe</label>
                      <input type="password" id="mdp" name="mdp" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="confmdp">Repeter votre Mot de Passe</label>
                    <input type="password" id="confmdp" name="confmdp" class="form-control" />
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Inscription</button>
                  </div>

                </form>

                <div class="alert alert-success">Vous possedez déjà un compte ? 
                <br><a href="connexion.php">Cliquez ici pour vous connectez !</a></div> 
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