<?php

namespace App\Database;

use PDO;
/*
Database représente une connexion à une base de données à l'aide de l'extension PDO (PHP Data Objects). La classe fournit des méthodes pour exécuter des requêtes SQL et renvoyer les résultats sous forme de tableaux.
La classe utilise un modèle singleton pour garantir qu'une seule instance de la classe est créée par application. La méthode getInstance() de la classe renvoie l'instance singleton de la classe, en la créant si elle n'existe pas déjà.
Le constructeur de la classe lit la configuration de la base de données à partir d'un fichier appelé config.ini situé dans le répertoire config de l'application. Le fichier de configuration est analysé à l'aide de la fonction parse_ini_file(), qui renvoie un tableau associatif de valeurs de configuration.
La classe Database fournit trois méthodes pour exécuter des requêtes SQL : query(), queryOne() et execute(). La méthode query() exécute une requête SELECT et renvoie un tableau de lignes sous forme de tableaux associatifs. La méthode queryOne() exécute une requête SELECT et renvoie une seule ligne sous forme de tableau associatif. La méthode execute() exécute une requête non-SELECT, telle qu'une requête INSERT ou UPDATE, et ne renvoie aucun résultat.
Les trois méthodes utilisent des requêtes préparées pour éviter les attaques par injection SQL. La requête SQL est passée en tant que paramètre de chaîne à la méthode, et les paramètres à lier à la requête sont passés en tant que paramètre de tableau.
*/

class Database
{
    private PDO $pdo;
    private static ?Database $instance = null;

    private function __construct()
    {
        if (!$config = parse_ini_file(__ROOT__ . 'config/config.ini', true)) {
            throw new \Exception('Erreur d\'accès au fichier de configuration config.ini');
        }

        $dsn = sprintf(
            '%s:host=%s;dbname=%s;charset=utf8mb4',
            $config['database']['driver'],
            $config['database']['host'],
            $config['database']['dbname']
        );

        $this->pdo = new PDO($dsn, $config['database']['user'], $config['database']['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function __destruct()
    {
        unset($this->pdo);
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }


    public function query(string $sql, array $params = []): array
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
        return $query->fetchAll();
    }

    public function queryOne(string $sql, array $params = []): array
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
        return $query->fetch();
    }

    public function execute(string $sql, array $params = []): void
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
    }
}
