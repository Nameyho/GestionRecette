<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require '../DAOEntities/RecetteDAO.php';
require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listing</title>
        <link rel ="stylesheet" href=  "../style/bootstrap.min.css"/>
        <link rel ="stylesheet" href=  "../style/style1.css"/>
         <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/script.js"></script>
    </head>
    <body>
        <div class="container">
        <header class="jumbotron">
        
      
        <h1 id='listing'>Listing</h1>
        </header>
            <body>
<?php
if (isset($_GET['page'])) {
        $page = intval($_GET['page']); //convertion string -> int, sécurité vis a vis du possible modification de l'URL
    } else {
        $page = 0;
        //On vient pour la 1ere fois dans la page
    }
   
    $group = 5;
    $mypdo = null;
    $pdo = null;
    MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
    $mypdo = MyPdo::getInstanceSingleton();

    $pdo = $mypdo->getPdo();
    $rdao= new RecetteDAO($pdo);
    $tab=$rdao->nbRecords();
  //  var_dump($rdao);
    
    $nbrecords = $tab['nb'];
        $pages = ceil($nbrecords / $group); //ceil =arrondir a l'unité supérieure  floor= arrondi inferieur  round=inf ou sup
        //echo $pages;

        //Ne pas déborder en negatif
        if ($page < 0) {

            $page = 0;
        }
        // Eviter d'aller trop loin et ne pas afficher un tab vide
        if ($page >= $pages) {
            $page = $pages - 1;
        }
        $tab2 = $rdao->recordsLimit($page, $group);
      //  var_dump($tab2);
         echo "<table border='1'>";
         echo "<th>id</th><th>nom</th><th>description</th><th>Administration</th>";
        //Recupération d'un tableau de tableau
$i=0;
       foreach ($tab2 as $value){
           //var_dump($value);
           echo "<tr>";
           echo "<td>" . $value['idRecette'] . "</td>";
           echo "<td>" . $value['nom'] . "</td>";
           echo "<td>" . $value['description'] . "</td>";
           echo "<td><a href='detail.php?id=" . $value['idRecette'] . "&page=" . $page . "'> Afficher</a> &nbsp;&nbsp;
                    <a href='modification.php?id=" . $value['idRecette'] . "&page=" . $page . "'> Modifier</a> &nbsp;&nbsp;
                    <a href='supprimer.php?id=" . $value['idRecette'] . "&page=" . $page . "'> Supprimer</a> 
            </td>";
            echo "</tr>";
       }
       echo '<input type="text" id="search" value="" />';
        echo "</table>";
        //5eme etape : Creation de 4 boutons
        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=0'><button> Debut </button></a>";
        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . "'><button> Precedent </button></a>";
        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . "'><button> Suivant </button></a>";
        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($pages - 1) . "'><button> Fin </button></a>";
        //connaitre la page en cour : $_SERVER['PHP_SELF']
        echo "<br>";
        echo ($page + 1) . " sur un total de " . $pages;
        
        
        $i = $i+1;
          ?>      
            </body>