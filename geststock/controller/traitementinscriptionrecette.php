<?php

session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../Entities/recette.php';
require '../DAOEntities/recetteDAO.php';


if ( !( isset($_POST['submit']) && $_POST['submit'] == "envoyer" ) ){
    // redirection si appel direct de la page
header("Location:incriptionAliment.php");
    }
else {
   
      
     extract($_POST); 

   
     try {
         
    $mypdo = null;
    $pdo = null;
    MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
    $mypdo = MyPdo::getInstanceSingleton();
    $pdo = $mypdo->getPdo();
    
    
     $r =new Recette();

     $r->setCreateur($_SESSION['login']);
     $r->setNom($nom);
     $r->setVisibilité(false);
     $r->setDescription($description);
     $rd = new RecetteDAO($pdo);  
      $_SESSION['idrecette']=   $rd->insert($r);
      $_SESSION['ajouter']=true;
      $_SESSION['recette']=$nom;
  
     } catch (Exception $exc) {
         echo $exc->getTraceAsString();
     }

    header('location:../vue/AjoutElementRecette.php');
    
}
   
    
