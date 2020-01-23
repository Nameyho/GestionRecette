<?php

session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/AcrDAO.php';

$mypdo = null;
$pdo = null;
MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
$mypdo = MyPdo::getInstanceSingleton();

$pdo = $mypdo->getPdo();
var_dump($_POST);
$acr = new AcrDAO($pdo);
$tab = $acr->findID($_POST['nom']);
var_dump($tab);

$tab2 = $acr->obtenirRecords($tab[0]['idaliment']);

var_dump($tab2);

$_SESSION['recettes']=$tab2;

   header("Location:../controller/nommerrecette.php");