<?php
session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/UtilisateurDAO.php';
require '../Entities/Utilisateur.php';

var_dump($_POST);

if ( !( isset($_POST))){
    // redirection si appel direct de la page
//header("Location:Login.php");
    echo'dede';
    }

else {
     extract($_POST); 
    $_SESSION['encodage'] = array();
    // les champs obligatoires
   
    $_SESSION['encodage']['login'] = $login;
    $_SESSION['encodage']['mdp']=$mdp;
    
    try{
        
        $u = new Utilisateur();
        
        $u->setLogin($login);
        $u->setMdp($mdp);
        
         $mypdo = null;
         $pdo = null;
         MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
         $mypdo = MyPdo::getInstanceSingleton();


         $pdo = $mypdo->getPdo();
         $ud= new UtilisateurDAO($pdo);
        $hash= $ud->recupHash($u);
       
        var_dump($hash);
       
        if(empty($hash)){
          //  header("Location:profil.php");
             
        }else{
            $hash= $hash[0]['mdp']; 
        }

    } catch (Exception $ex) {

         echo 'echoue';
    }
    try {
         if(( password_verify ( $mdp ,  $hash ))){
     
  
        $ud->desactiver($u);
        session_destroy();
        header("Location:../vue/accueil.php");
    } else{
          header("Location:../vue/profil.php");
    }
    } catch (Exception $ex) {
        header("Location:../vue/profil.php");
    }
  
}