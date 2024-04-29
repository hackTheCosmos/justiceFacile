<?php

namespace App\Models;

use App\Models\Model;

class AvocatsModel extends Model {

    protected $id;
    protected $nomBarreau;
    protected $nom;
    protected $prenom;
    protected $raisonSociale;
    protected $siretSiren;
    protected $adresse;
    protected $codePostal;
    protected $ville;


    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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
     * Get the value of nomBarreau
     */ 
    public function getNomBarreau()
    {
        return $this->nomBarreau;
    }

    /**
     * Set the value of nomBarreau
     *
     * @return  self
     */ 
    public function setNomBarreau($nomBarreau)
    {
        $this->nomBarreau = $nomBarreau;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of raisonSociale
     */ 
    public function getRaisonSociale()
    {
        return $this->raisonSociale;
    }

    /**
     * Set the value of raisonSociale
     *
     * @return  self
     */ 
    public function setRaisonSociale($raisonSociale)
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    /**
     * Get the value of siretSiren
     */ 
    public function getSiretSiren()
    {
        return $this->siretSiren;
    }

    /**
     * Set the value of siretSiren
     *
     * @return  self
     */ 
    public function setSiretSiren($siretSiren)
    {
        $this->siretSiren = $siretSiren;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of codePostal
     */ 
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     *
     * @return  self
     */ 
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }
}