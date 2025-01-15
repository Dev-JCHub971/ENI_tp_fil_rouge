<?php

/**
 * Ce fichier définit les variables de titre et de description pour le projet ENI ECOLE - TP Fil Rouge - Gestion des articles.
 * La variable de titre est définie sur 'ENI ECOLE - TP Fil Rouge - Gestion des articles'.
 * La variable de description est définie sur 'Apprenez PHP en créant et en gérant des articles en ligne'.
 */
$title = 'ENI ECOLE - TP Fil Rouge - Gestion des articles';
$description = 'Apprenez PHP en créant et en gérant des articles en ligne';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    /*
        La syntaxe <?= ?> est une abréviation de <?php echo ?>, ce qui signifie que la valeur de $title sera imprimée à l'écran.
        Cette ligne affichera la valeur de $title dans la sortie HTML de la page. 
        C'est une façon courante d'afficher dynamiquement du contenu sur une page web, car la valeur de $title peut être modifiée en fonction de diverses conditions ou de l'entrée de l'utilisateur.
        Il convient de noter que cet extrait de code est très court et simple, mais il peut faire partie d'un fichier PHP plus grand qui génère la sortie HTML d'une page web.
        Dans un tel cas, la variable $title pourrait être définie en fonction de la page affichée, et la sortie de cette ligne ferait partie de la balise <title> dans l'en-tête HTML.
        Dans l'ensemble, cet extrait de code est une façon concise d'afficher la valeur d'une variable en PHP, et il peut être utilisé dans divers contextes pour générer dynamiquement du contenu sur une page web.
    */
    ?>
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
        <a class="navbar-brand" href="/">TP Fil Rouge</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto d-flex">
                <?php
                /*
                    Le code utilise un opérateur ternaire pour ajouter conditionnellement la classe active aux balises <li> et <a> si l'URL actuelle correspond à l'URL de la page d'accueil (/ ou /index.php).
                    La variable $_SERVER['REQUEST_URI'] contient le chemin d'URL actuel, qui est comparé à la chaîne de caractères / ou /index.php à l'aide de l'opérateur in_array(). 
                    Si les deux chaînes correspondent, l'opérateur ternaire renvoie la chaîne active, qui est ajoutée à l'attribut class des balises <li> et <a>.
                    Cet extrait de code est utile pour générer des menus de navigation dynamiques qui mettent en évidence la page ou la section actuelle d'un site web. 
                    En utilisant la variable $_SERVER['REQUEST_URI'], le code peut fonctionner avec n'importe quel chemin d'URL, ce qui facilite sa réutilisation sur différentes pages et sections d'un site web.
                */
                ?>
                <li class="nav-item <?= in_array($_SERVER['REQUEST_URI'], ['/', '/index.php']) ? 'active' : '' ?>">
                    <a class="nav-link <?= in_array($_SERVER['REQUEST_URI'], ['/', '/index.php']) ? 'active' : '' ?>" href="index.php" aria-current="page">Accueil</a>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI'] === '/inscrire.php' ? 'active' : '' ?>">
                    <a class="nav-link  <?= $_SERVER['REQUEST_URI'] === '/inscrire.php' ? 'active' : '' ?>" href="inscrire.php">S'inscrire</a>
                </li>
            </ul>
            <span class="navbar-text d-block w-100">
                <a class="nav-link float-lg-end" href="se-connecter.php">Se connecter <i class="bi bi-person-circle"></i></a>
            </span>
        </div>
    </nav>

    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Bienvenue sur notre Système de Gestion d'Articles</h1>
            <p class="col-md-8 fs-4">Apprenez PHP en créant et en gérant des articles en ligne.</p>
            <button class="btn btn-primary btn-lg" type="button">S'inscrire</button>
        </div>
    </div>
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-bg-dark rounded-3">
                <h2>Information</h2>
                <p>Veuillez vous connecter pour utiliser l'application !</p>
                <button class="btn btn-outline-light" type="button">Se connecter</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                <h2>À Propos</h2>
                <p>Ce site vous permet d'apprendre le PHP en créant et en gérant des articles en ligne.
                    <br><br>
                    Connectez-vous pour commencer à créer et afficher vos propres articles.
                </p>
                <button class="btn btn-outline-secondary" type="button">Se connecter</button>
            </div>
        </div>
    </div>

    <footer>
        <img src="assets/img/logo-eni.png"> ENI ECOLE - TP FIL ROUGE - Gestion des articles
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>