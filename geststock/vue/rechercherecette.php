<?php

session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/AlimentDAO.php';
?>


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
        
      
        <h1 class="header">rechercher aliment</h1>
          <label for="type">choissisez l'aliment </label>
             </header>
            
          <form class="form-horizontal" action="../controller/filtreralim.php" method="post">    
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
    
    
    <?php
    if((isset($_SESSION['nomrecettes']) && $_SESSION['nomrecettes']!=null)){
                        echo "<table border='1'>";
         echo "<th>nom</th>";
         
         
      foreach ($_SESSION['nomrecettes'] as $value){
           
           
           echo "<tr>";
           echo "<td>" . $value[0]['nom'] . "</td>";
        
           
            echo "</tr>";
           
       }
    }
    $_SESSION['nomrecettes']= null;
    ?>
    </form>
        </div>
    </body>
</html>