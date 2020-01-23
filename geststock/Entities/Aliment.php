<?php

class Aliment {
    
    private $createur;
    private $id;
    private $nom;
    private $type;
    private $visibilite =false;
    function get_visibilite() {
        return $this->visibilite;
    }

    function set_visibilite($visibilite) {
        $this->visibilite = $visibilite;
    }

        
    function getType() {
     return   $this->type;
    }
    
    function setType($type){
        $this->type = $type;
    }
    function getCreateur() {
        return $this->createur;
    }

    function setCreateur($createur) {
        $this->createur = $createur;
    }
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }


}
