<?php
session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/TypeDAO.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajouter Aliments</title>
        <link rel ="stylesheet" href=  "../style/bootstrap.min.css"/>
        <link rel ="stylesheet" href=  "../style/style1.css"/>
    </head>
    <body>
        <div class="container">
        <header class="jumbotron">
        
      
        <h1 class="header">Ajouter Aliments</h1>
        </header>
        </div>
 <div class="container">
     <?php
     if(isset($_SESSION['ajouter']))
         echo '<h4> element ajouté </h4>'
     ?>
 
     <form class="form-horizontal" action="../controller/traitementinscriptionaliment.php" method="post">
    <div class="form-group">
      
      <label class="control-label col-sm-2" for="email">Nom Aliment :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nom" placeholder="Entrez le nom de l'Aliment" name="nom">
      </div></div>
       <span class="error">
        <?php
        if(isset($_SESSION['error']['login'])) { echo $_SESSION['error']['login']; }
        
        if(isset($_SESSION['dupliquer3'])) { echo $_SESSION['dupliquer3']; }
        ?>
         </span>
      <label for="type">choissisez le type </label>
      <select class="form-control" name="type" id="type" size ="1">
                  <?php
      
       $mypdo = null; 
       $pdo = null;   
       MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
         $mypdo = MyPdo::getInstanceSingleton();
      
        $pdo = $mypdo->getPdo();
         $td= new TypeDAO($pdo);
        $tab = $td->findAll();
        
      
         foreach ($tab as $value){
      echo'<option>'.$value['nom'].'</option>';
  }
     
       ?>

      </select>
    
     
     
   

     
    
    <fieldset>
        <legend>votre action</legend>
        <input type="submit" name="submit" id="submit" value="envoyer">
        &nbsp;&nbsp;&nbsp;
        <input type="reset" name="reset" id="reset" value="annuler">
        &nbsp;&nbsp;&nbsp;
        <input type="button" name="help" id="aide" value="aide">
    </fieldset>
  
</div>
      </form>
    </body>
</html>
