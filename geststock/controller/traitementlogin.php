<?php

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/UtilisateurDAO.php';
require '../Entities/Utilisateur.php';

ini_set("session.gc_maxlifetime","600");

session_start();


if ( !( isset($_POST['submit']) && $_POST['submit'] == "envoyer" )){
    // redirection si appel direct de la page
header("Location:../vue/Login.php");
    
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
        $statut = $ud->statutActivation($login);
        var_dump($statut);
          
        if((!(isset($hash))) ){
            header("Location:../vue/login.php");
        }
 $hash=($hash[0]['mdp']);
    } catch (Exception $ex) {

         echo 'echoue';
    }
    
    if(( password_verify ( $mdp ,  $hash ))){
     echo 'mdp identique';
    if($statut[0]['activation']==0){
        $_SESSION['co']=false;
    }else{
         $_SESSION['login']=$login;
         $_SESSION['co']= true;
         echo $statut[0]['activation'];
    }
      
       
         
    }
     header("Location:../vue/accueil.php");
    
}