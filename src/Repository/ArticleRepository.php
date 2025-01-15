<?php

namespace App\Repository;

use App\Database\Database;
use App\Entity\Article;
use DateTimeImmutable;

class ArticleRepository
{
    public static function findAll(): array
    {
        $connection = Database::getInstance();
        $sql = "SELECT * FROM articles";
        $articles = $connection->query($sql);
        foreach ($articles as $key => $article) {
            $articles[$key] = Article::hydrate($article);
        }

        return $articles;
    }

    public static function findById(int $id): Article
    {
        $connection = Database::getInstance();
        $sql = "SELECT * FROM articles WHERE id = ?";
        $article = $connection->queryOne($sql, [$id]);
        return Article::hydrate($article);
    }

    public static function update(Article $article)
    {
        $connection = Database::getInstance();
        $connection->execute(
            "UPDATE articles SET titre = ?, contenu = ? WHERE id = ?",
            [
                $article->getTitre(),
                $article->getContenu(),
                $article->getId(),
            ]
        );
    }

    public static function delete(int $id)
    {
        $connection = Database::getInstance();
        $connection->execute(
            "DELETE FROM articles WHERE id = ?",
            [$id]
        );
    }

    /*
        Voici la méthode statique insert () de la classe ArticleRepository. Cette méthode prend un objet d'article en tant que paramètre et insère les données de l'article dans la base de données.
        La méthode obtient d'abord une connexion de base de données à l'aide de la méthode getInstance () de la classe de base de données. Cette méthode renvoie une instance singleton de la classe de base de données, qui représente une connexion à la base de données.
        Ensuite, la méthode utilise la méthode EXECUTE () de la classe de base de données pour exécuter une requête SQL qui insère les données de l'article dans le tableau des articles. La requête utilise les espaces réservés (?) pour représenter les valeurs à insérer, et les valeurs réelles sont passées en tant que tableau comme deuxième paramètre de la méthode EXECUTE ().
        Les valeurs à insérer sont obtenues à partir de l'objet d'article à l'aide de ses méthodes Getter, telles que getTitre () et getContenu (). La valeur date_publication est définie sur la date et l'heure actuelles à l'aide de la classe DateTimeMutable et de sa méthode Format ().
    */
    public static function insert(Article $article)
    {
        $connection = Database::getInstance();
        $connection->execute(
            "INSERT INTO articles (titre, contenu, date_publication, auteur_id) VALUES (?, ?, ?, ?)",
            [
                $article->getTitre(),
                $article->getContenu(),
                (new DateTimeImmutable())->format('Y-m-d H:i:s'),
                $article->getAuteurId(),
            ]
        );
    }
}
