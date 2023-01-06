<?php

require_once 'inc/log_bdd.php';
require_once 'inc/fonction.php';

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Marché Noir - Call of Duty Black Ops 3</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/marche.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    </head>
    <body>
<?php require_once 'inc/navbar.php'; ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Bienvenue au Marché Noir</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Ici vous pouvez acheter des armes pour enrichir votre experience de jeu</p>
                </div>
            </div>
        </header>
        <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
            $arme = $pdoCOD->query ( "SELECT * FROM arme WHERE id_arme ORDER BY id_arme DESC LIMIT 8"); 
            
            while($info = $arme->fetch(PDO::FETCH_ASSOC)) {


            echo   "<div class=\"col mb-5\">";
                echo   "<div class=\"card h-100\">";
                echo   "<img class=\"card-img-top\" src=\"$info[Photo]\" alt=\"Photos de l'arme\" />";
                echo      "<div class=\"card-body p-4\">";
                echo          "<div class=\"text-center\">";
                echo              "<h5 class=\"fw-bolder\">$info[Nom]</h5>";
                echo            "<p>$info[prix] €</p>";
                echo          "</div>";
                echo      "</div>";
                echo        "<div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">";
                echo           "<div class=\"text-center\"><a class=\btn btn-outline-dark mt-auto\" href=\"#\">Achetez</a></div>";
                echo       "</div>";
                echo    "</div>";
                echo "</div>";

            }
      ?>
        </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Call of Duty : Black Ops 3</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
