<?php

namespace App\Models;

use App\Core\Db;


class Model extends Db 
{
    // Table de la base de données
    protected $table;

    //Instance de Db
    private $db;

    /**
     * méthode qui permet de définir si on doit faire une requête préparée ou non et execute la requete sql
     *
     * @param string $query
     * @param array|null $attributs
     * @return object
     */
    public function doQuery (string $query, array $attributs = null): object
    {
        //on récupère l'instance de Db
        $this->db = Db::getInstance();

        //on vérifie si on a des attributs
        if($attributs !== null) 
        {
            //requête préparée
            $sth = $this->db->prepare($query);
            $sth->execute($attributs);
            return $sth;
        } else 
        {
            //requête simple
            $sth = $this->db->query($query);
            return $sth;
        }
    }

    public function findById($id) {
        return $this->doQuery("SELECT * FROM barreaux WHERE id=$id")->fetch();
    }
}