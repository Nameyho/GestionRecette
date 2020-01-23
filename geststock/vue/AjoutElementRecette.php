
<?php
session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/AlimentDAO.php';

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
        <title>Ajouter Aliment dans la recette</title>
        <link rel ="stylesheet" href=  "../style/bootstrap.min.css"/>
        <link rel ="stylesheet" href=  "../style/style1.css"/>
    
    </head>
    <body>
        <div class="container">
        <header class="jumbotron">
        
      
        <h1 class="header">Ajouter Aliment dans la recette</h1>
        </header>
        </div></div>
 <div class="container">
   
     <form class="form-horizontal" action="../controller/traitementAjoutElemRec.php" method="post">
    <div class="form-group">
    <span class="error">
        <?php
       
        
        if(isset($_SESSION['dupliquer2'])) { echo $_SESSION['dupliquer2']; }
        ?>
         </span>
     <div class="form-group">
      <label class="control-label col-sm-2" for="email"> quantité  :</label>
      
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nom" placeholder="Entrez le nom de l'aliment à ajouté à la recette" name="quantite">
      </div></div>
     
          <label for="type">choissisez l'aliment </label>
      <select class="form-control" name="nom" id="nom" size ="1">
                  <?php
      
       $mypdo = null; 
       $pdo = null;   
       MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
         $mypdo = MyPdo::getInstanceSingleton();
      
        $pdo = $mypdo->getPdo();
         $td= new AlimentDAO($pdo);
        $tab = $td->findAll();
        
      
         foreach ($tab as $value){
      echo'<option>'.$value['nomAliment'].'</option>';
      
      
     }
     
  
   
        
       ?>

       
    </div></div>
    <fieldset>
        <legend>votre action</legend>
        <input type="submit" name="submit" id="submit" value="envoyer">
        &nbsp;&nbsp;&nbsp;
        <input type="reset" name="reset" id="reset" value="annuler">
        &nbsp;&nbsp;&nbsp;
        <input type="button" name="help" id="aide" value="aide">
    </fieldset>
  
</div>
     
     
     <div>
         <h3>Tableau des aliments</h3>
         <?php
    
        //Recupération d'un tableau de tableau
if(isset($_SESSION['tabaliment'])){
                echo "<table border='1'>";
         echo "<th>nom</th><th>quantite</th><th>action</th>";
      foreach ($_SESSION['tabaliment'] as $value){
           $id=$td->find($value['idaliment']);
           
           echo "<tr>";
           echo "<td>" . $id[0]['nomAliment'] . "</td>";
           echo "<td>" . $value['quantite'] . "</td>";
           echo "<td>";
           echo " <a href='../controller/suppressionaliment.php?id=" . $value['idaliment'] ."&recette=" . $value['idRecette'] .  "'> Supprimer</a>" ; 
           echo "</td>";
           
            echo "</tr>";
           
       }
            echo "<td>.  .</td><td>.   .</td><td> . <input type=\"submit\" name=\"ajouter\" id=\"submit\" value=\"ajouter\" \"></td>";
}         ?>

     
         
     </div> </form>
    </body>
</html>
