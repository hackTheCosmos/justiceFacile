<?php

namespace App\Models;

use App\Models\Model;

class BarsModel extends Model {

    protected $id;
    protected $name;
    protected $address;
    protected $nombre_avocats;
    protected $cour_appel;
    protected $site_internet;
    protected $numero_telephone;

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of nombre_avocats
     */ 
    public function getNombre_avocats()
    {
        return $this->nombre_avocats;
    }

    /**
     * Set the value of nombre_avocats
     *
     * @return  self
     */ 
    public function setNombre_avocats($nombre_avocats)
    {
        $this->nombre_avocats = $nombre_avocats;

        return $this;
    }

    /**
     * Get the value of cour_appel
     */ 
    public function getCour_appel()
    {
        return $this->cour_appel;
    }

    /**
     * Set the value of cour_appel
     *
     * @return  self
     */ 
    public function setCour_appel($cour_appel)
    {
        $this->cour_appel = $cour_appel;

        return $this;
    }

    /**
     * Get the value of site_internet
     */ 
    public function getSite_internet()
    {
        return $this->site_internet;
    }

    /**
     * Set the value of site_internet
     *
     * @return  self
     */ 
    public function setSite_internet($site_internet)
    {
        $this->site_internet = $site_internet;

        return $this;
    }

    /**
     * Get the value of numero_telephone
     */ 
    public function getNumero_telephone()
    {
        return $this->numero_telephone;
    }

    /**
     * Set the value of numero_telephone
     *
     * @return  self
     */ 
    public function setNumero_telephone($numero_telephone)
    {
        $this->numero_telephone = $numero_telephone;

        return $this;
    }

    
}
