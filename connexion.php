<?php  
require_once 'inc/log_bdd.php'; 
require_once 'inc/fonction.php';
// debug($_GET);
$message = '';
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') { // si il existe action qui contient 'deconnexion' dans l'url
    unset($_SESSION['membre']); // on supprime le membre de la session (le contenu du tableau indice membre)
    $message = '<div class="alert alert-success">Vous êtes Déconnecté</div>';// message de déconnexion cf echo plus bas
    //debug($_SESSION);
}
// redirection vers la page profil
 if (estConnecte()) {
  header('location:profil.php');
  exit();
}
// traitement du formulaire de connexion
//   debug($_POST);

if(!empty($_POST)) {
    if (empty($_POST['pseudo'])) { //si c'est vide - 0 ou null c'est FALSE
        $contenu .='<div class="alert alert-danger">Le pseudo est requis !</div>';
    }
    if (empty($_POST['mdp'])) {
        $contenu .='<div class="alert alert-danger">Le mot de passe est manquant !</div>';
    }
    if (empty($contenu)) {
        $resultat = executeRequete("SELECT * FROM membre WHERE pseudo =:pseudo ",
        array (
            ':pseudo' => $_POST['pseudo'],
            // ':mdp' => $_POST['mdp'],
        ));
    
        if ($resultat->rowCount() == 1) {
            $membre = $resultat->fetch(PDO ::FETCH_ASSOC);
            // debug($membre);


            if (password_verify($_POST['mdp'], $membre['mdp'])) {
                // echo 'coucou';
                $_SESSION['membre'] = $membre;

                // debug($_SESSION);
                header('location:profil.php');//VOIR
                exit();
            }else {
              $contenu .='<div class="alert alert-danger">Erreur sur les identifiants !</div>';
            }
        }else {
          $contenu .='<div class="alert alert-danger">Erreur sur les identifiants !</div>';
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
    <title>Connexion</title>
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

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Connexion</p>

                <form method="POST" class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="pseudo">Pseudo</label>
                      <input type="text" id="pseudo" name="pseudo" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="mdp">Mot de Passe</label>
                      <input type="password" id="mdp" name="mdp" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Connexion</button>
                  </div>

                </form>

                <?php debug($_SESSION); echo $message, $contenu ?>
                <div class="alert alert-success">Pas encore membre ? 
                <br><a href="inscription.php">Cliquez ici pour vous inscrire !</a></div> 
            </div>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

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