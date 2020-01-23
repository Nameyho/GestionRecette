<?php

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../Entities/AlimComprec.php';
require '../DAOEntities/AcrDAO.php';


if(isset($_GET['id'])){
        
         $mypdo = null;
         $pdo = null;
         MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
         $mypdo = MyPdo::getInstanceSingleton();
         $pdo = $mypdo->getPdo();
  $acr = new AcrDAO ($pdo);
$acr->deletealiment($_GET['id'],$_GET['recette']);

header('location:../vue/AjoutElementRecette.php');
}else{
   header('location:../vue/AjoutElementRecette.php') ;
};
  
         



?>