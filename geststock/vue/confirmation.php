<?php

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/UtilisateurDAO.php';
require '../Entities/Utilisateur.php';


$u = new Utilisateur();
        
        $u->setLogin($_GET['login']);
        
        $u->set_code($_GET['code']);
        
         $mypdo = null;
         $pdo = null;
         MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
         $mypdo = MyPdo::getInstanceSingleton();


         $pdo = $mypdo->getPdo();
         $ud= new UtilisateurDAO($pdo);
         $err =$ud->activercompte($u);
         
         







header("Location:../vue/accueil.php");