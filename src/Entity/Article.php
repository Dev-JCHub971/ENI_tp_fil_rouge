<?php

namespace App\Entity;

class Article
{
    private $id;
    private $titre;
    private $contenu;
    private $datePublication;
    private $auteurId;
    private $auteur;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of contenu
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of datePublication
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set the value of datePublication
     *
     * @return  self
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get the value of auteur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /*
        Voici la méthode statique hydrate() de la classe Article appelé précédemment. Cette méthode prend un tableau de données représentant un article et renvoie un nouvel objet Article avec les données mappées à ses propriétés.
        La méthode hydrate() est une méthode personnalisée utilisée pour créer de nouveaux objets Article à partir de tableaux de données, tels que ceux obtenus à partir d'une requête de base de données ou d'une soumission de formulaire. La méthode crée d’abord un nouvel objet Article à l’aide du constructeur par défaut, puis définit les propriétés de l’objet en fonction des données du tableau d’entrée.
        La méthode utilise l'opérateur de fusion nul (??) pour fournir des valeurs par défaut pour les propriétés au cas où elles ne seraient pas présentes dans le tableau d'entrée. Cela garantit que l'objet Article est toujours créé avec des valeurs de propriété valides, même si certaines données d'entrée sont manquantes ou nulles.
        La méthode hydrate() est un bon exemple de la façon de mapper les données d’un tableau vers un objet en PHP. En utilisant une méthode personnalisée pour effectuer le mappage, le code est capable de faire abstraction des détails du processus de mappage et de fournir une interface plus intuitive et plus maintenable pour travailler avec les objets Article.
    */
    public static function hydrate(array $data): Article
    {
        $article = new Article();
        $article->setId($data['id'] ?? null);
        $article->setTitre($data['titre'] ?? null);
        $article->setContenu($data['contenu'] ?? null);
        $article->setDatePublication($data['date_publication'] ?? null);
        $article->setAuteurId($data['auteur_id'] ?? null);

        return $article;
    }



    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of auteurId
     */
    public function getAuteurId()
    {
        return $this->auteurId;
    }

    /**
     * Set the value of auteurId
     *
     * @return  self
     */
    public function setAuteurId($auteurId)
    {
        $this->auteurId = $auteurId;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'titre' => $this->getTitre(),
            'contenu' => $this->getContenu(),
            'datePublication' => $this->getDatePublication(),
            'auteurId' => $this->getAuteurId(),
            'auteur' => $this->getAuteur(),
        ];
    }
}
