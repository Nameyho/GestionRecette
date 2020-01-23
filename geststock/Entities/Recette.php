<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Recette
 *
 * @author mathi
 */
class Recette {
    
    private $nom;
    private $tabaliment = array();
    private $visibilité;
    private $id;
    private $description;
    private $createur;
    
    function getCreateur() {
        return $this->createur;
    }

    function setCreateur($createur) {
        $this->createur = $createur;
    }

        function getNom() {
        return $this->nom;
    }

    function getTabaliment() {
        return $this->tabaliment;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setTabaliment($tabaliment) {
        $this->tabaliment = $tabaliment;
    }

        
    function getVisibilité() {
        return $this->visibilité;
    }

    function getId() {
        return $this->id;
    }

    function getDescription() {
        return $this->description;
    }

    function setVisibilité($visibilité) {
        $this->visibilité = $visibilité;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescription($description) {
        $this->description = $description;
    }


    
}
