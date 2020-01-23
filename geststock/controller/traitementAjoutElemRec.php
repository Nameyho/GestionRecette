<?php

session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../Entities/AlimComprec.php';
require '../DAOEntities/AcrDAO.php';


if ( !( isset($_POST['submit']) && $_POST['submit'] == "envoyer" ) ){
    // redirection si appel direct de la page
    var_dump($_POST);
  if(isset($_POST['ajouter'])){
        ajoutelem();
   }  else if($_POST['supprimer']){
       supprimerelem();
   }   
 header('location:../vue/AjoutElementRecette.php');
    }
else  
    {
    
    ajoutelem();
};

   function ajoutelem(){
       
       
        var_dump($_POST);
     extract($_POST); 

   
     try {
         
    $mypdo = null;
    $pdo = null;
    MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
    $mypdo = MyPdo::getInstanceSingleton();
    $pdo = $mypdo->getPdo();
    
    
     $acr =new AlimCompRec();

     
     $acr->set_idRecette($_SESSION['recette']);
     $acr->set_quantité($quantite);
     $acr->set_idAliment($nom);
             
     $acrDAO = new AcrDAO($pdo);
     
     
     $err =$acrDAO->insert($acr);
      if(($err == 1062)){
             echo $err;
            $_SESSION['dupliquer2'] = "Aliment déjà existant"; 
              header("Location:../vue/ajoutElementRecette.php");
             exit();
         }else{
             $_SESSION['dupliquer2']=null;
         }
     $tab =$acrDAO->getToutAliments($_SESSION['recette']);
     
     
     $_SESSION['tabaliment']=$tab;
     
    
  
     } catch (Exception $exc) {
         echo $exc->getTraceAsString();
     }

     header('location:../vue/AjoutElementRecette.php');
   
   };
    

   
    
