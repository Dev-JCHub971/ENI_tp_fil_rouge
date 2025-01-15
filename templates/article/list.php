<?php require_once __ROOT__ . 'templates/_seo.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?> - S'inscrire</title>
    <meta name="description" content="<?= $description ?>">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
        <a class="navbar-brand" href="/">TP Fil Rouge</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php require __ROOT__ . 'templates/_menu.php'; ?>
    </nav>

    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Système de Gestion d'Articles</h1>
            <p class="col-md-8 fs-4">Les articles</p>
        </div>
    </div>

    <a href="/article/new" class="btn btn-primary">Ecrire un article</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Date de publication</th>
                <th scope="col">Auteur</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) : ?>
                <tr>
                    <th scope="row"><?= $article->getId(); ?></th>
                    <td><?= $article->getTitre(); ?></td>
                    <td><?= $article->getDatePublication(); ?></td>
                    <td><?= \App\Repository\AuteurRepository::findById($article->getAuteurId()); ?></td>
                    <td>
                        <a href="/article/show/<?= $article->getId(); ?>" class="btn btn-primary"><i class="bi bi-eye-fill"></i> Voir</a>
                        <a href="/article/edit/<?= $article->getId(); ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i> Modifier</a>
                        <a href="/article/delete/<?= $article->getId(); ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <footer>
        <img src="/assets/img/logo-eni.png"> ENI ECOLE - TP FIL ROUGE - Gestion des articles
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>