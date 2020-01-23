<?php

session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../Entities/Aliment.php';
require '../DAOEntities/AlimentDAO.php';


if ( !( isset($_POST['submit']) && $_POST['submit'] == "envoyer" ) ){
    // redirection si appel direct de la page
header("Location:incriptionAliment.php");
    }
else {
    echo 'fff0';
     extract($_POST); 
    
     var_dump($_POST);

   
     try {
         
    $mypdo = null;
    $pdo = null;
    MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
    $mypdo = MyPdo::getInstanceSingleton();
    $pdo = $mypdo->getPdo();
    
    
     $a =new Aliment();

     $a->setCreateur($_SESSION['login']);
     $a->setNom($nom);
     $a->setType($type);
     $ad = new AlimentDAO($pdo);  
     $err =$ad->insert($a);
     
     if(($err == 1062)){
             echo $err;
            $_SESSION['dupliquer3'] = "Aliment déjà existant"; 
              header("Location:../vue/inscriptionAliment.php");
             exit();
         }else{
             $_SESSION['dupliquer3']= null;
         }
      $_SESSION['ajouter']=true;
     
     } catch (Exception $exc) {
         echo $exc->getTraceAsString();
     }

    header('location:../vue/inscriptionAliment.php');
    
}
   
    
