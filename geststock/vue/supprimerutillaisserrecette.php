<?php
session_start();
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
        <title>Login</title>
        <link rel ="stylesheet" href=  "../style/bootstrap.min.css"/>
        <link rel ="stylesheet" href=  "../style/style1.css"/>
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/script.js"></script>
    </head>
    <body>
        <h3> supprimer compte en laissant recette </h3>
 <div class="container">
 
     <form class="form-horizontal" action="../controller/traitementsuppression2.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Compte utilisateur :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="login" placeholder="Entrez votre nom de compte" name="login">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">mot de passe:</label>
      <div class="col-sm-10">          
          <input type="password" class="form-control" id="mdp" placeholder="Entre un mot de passe" name="mdp">
      </div>
    </div>
   
    
   <fieldset>
        <legend>votre action</legend>
        <input type="submit" name="submit" id="submit" value="envoyer">
        &nbsp;&nbsp;&nbsp;
        <input type="reset" name="reset" id="reset" value="annuler">
        &nbsp;&nbsp;&nbsp;
        <input type="button" name="help" id="aide" value="aide">
    </fieldset>

  </form>
</div>
      
    </body>
</html>

