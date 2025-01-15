<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Entity\Article;

class ArticleController
{
    public function list()
    {
        $articles = ArticleRepository::findAll();
        require_once '../templates/article/list.php';
    }

    public function new()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $article = [
                'titre' => htmlspecialchars($_POST['titre']),
                'contenu' => htmlspecialchars($_POST['contenu']),
            ];

            if (array_search(false, $article) === false) {
                /*
                    Le code appelle d'abord la méthode statique hydrate() de la classe Article, en passant un tableau de données représentant le nouvel article. La méthode hydrate() est une méthode personnalisée qui mappe les données du tableau aux propriétés d'un nouvel objet Article et renvoie l'objet.
                    Ensuite, le code définit l'ID de l'auteur du nouvel article sur l'ID de l'auteur actuellement connecté. Cela est fait en décodant la clé auteur du tableau superglobal $_SESSION, qui contient une chaîne JSON représentant l'auteur actuellement connecté, et en accédant à la clé id du tableau associatif résultant.
                    Après avoir défini l'ID de l'auteur, le code appelle la méthode statique insert() de la classe ArticleRepository, en passant l'objet Article en tant que paramètre. La méthode insert() est une méthode personnalisée qui insère le nouvel article dans la base de données.
                    Enfin, le code utilise la fonction header() pour envoyer une réponse de redirection HTTP au client, en lui indiquant de naviguer vers la page de liste des articles. L'en-tête Location spécifie l'URL de la page de liste des articles, qui est /article/list.
                */
                $article = Article::hydrate($article);
                $article->setAuteurId(json_decode($_SESSION['auteur'], true)['id']);
                ArticleRepository::insert($article);
                header('Location: /article/list');
                exit();
            }
        }
        require_once '../templates/article/new.php';
    }

    public function show($id)
    {
        $article = ArticleRepository::findById($id);
        require_once '../templates/article/show.php';
    }

    public function edit($id)
    {
        $article = ArticleRepository::findById($id);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $article = [
                'id' => $id,
                'titre' => htmlspecialchars($_POST['titre']),
                'contenu' => htmlspecialchars($_POST['contenu']),
            ];

            if (array_search(false, $article) === false) {
                $article = Article::hydrate($article);
                ArticleRepository::update($article);
                header('Location: /article/list');
                exit();
            }
        }

        if ($article instanceof Article) {
            $article = $article->toArray();
        }

        require_once '../templates/article/edit.php';
    }

    public function delete($id)
    {
        ArticleRepository::delete($id);
        header('Location: /article/list');
        exit();
    }
}
