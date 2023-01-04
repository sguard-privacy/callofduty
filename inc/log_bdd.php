<?php
    // 1-Variables de connexion à la BDD
    $host = 'localhost';// le chemin vers le serveur de données
    $database = 'call_of_duty';// le nom de la BDD
    $user = 'root';// le nom d'utilisateur pour se connecter
    $psw = '';// mdp PC XAMPP

    // Retourne une instance de PDO. La signature de la fonction getInstancePDO implique que l'objet doit être nécessairement de type PDO
    // Sinon une erreur sera levée
    $pdoCOD = new PDO('mysql:host='.$host.';dbname='.$database,$user,$psw,
    array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// pour afficher les warnings SQL dans le navigateur
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// pour définir le charset des échanges avec la BDD
    ));

// 2- OUVERTURE DE SESSION
session_start();

    //4- UNE VARIABLE POUR LE FORMULAIRE
    $confirmation = '';
    $erreur = '';
    $contenu = '';

//3- CHEMIN DU SITE DANS UNE CONSTANTE
// ici on définit le chemin absolu dans une constante, on écrira tous les chemins src et href avec cette constante
// chez l'hébergeur on écrira ce qui suit
// define('RACINE_SITE', '/');
define('RACINE_SITE', '');

?>