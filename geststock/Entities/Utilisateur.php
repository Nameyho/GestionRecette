<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateur
 *
 * @author mathi
 */
class Utilisateur {
    //put your code here
    
 
    private $id;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    private $email;
    private $activation;
    private $code;
     
    function get_code() {
        return $this->code;
    }

    function set_code($code) {
        $this->code = $code;
    }

        
    
    function get_activation() {
        return $this->activation;
    }

    function set_activation($activation) {
        $this->activation = $activation;
    }

    
    function getLogin(){
        return $this->login;
    }
    
    function setLogin($login){
        $this->login = $login;
    }
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setEmail($email) {
        $this->email = $email;
    }


    
}
