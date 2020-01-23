<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlimCompRec
 *
 * @author mathi
 */
class AlimCompRec {
    
    private $idRecette;
    private $quantité;
    private $idAliment;
    
    
    function get_idRecette() {
        return $this->idRecette;
    }

    function get_quantité() {
        return $this->quantité;
    }

    function get_idAliment() {
        return $this->idAliment;
    }

    function set_idRecette($idRecette) {
        $this->idRecette = $idRecette;
    }

    function set_quantité($quantité) {
        $this->quantité = $quantité;
    }

    function set_idAliment($idAliment) {
        $this->idAliment = $idAliment;
    }


}
