<?php
session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/RecetteDAO.php';

$mypdo = null;
$pdo = null;
MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
$mypdo = MyPdo::getInstanceSingleton();

$pdo = $mypdo->getPdo();
$rdao= new RecetteDAO($pdo);

if(isset($_SESSION['recettes'])){
    $i =0;
    $_SESSION['nomrecettes']=array();
    var_dump($_SESSION['recettes']);
    foreach ($_SESSION['recettes'] as $val){
        
        $temp = $rdao->find($val['idrecette']);
        var_dump($temp);
        array_push($_SESSION['nomrecettes'], $temp);
        $i=$i+1;
    }
   
    
   
    header("Location:../vue/rechercherecette.php");
    
}