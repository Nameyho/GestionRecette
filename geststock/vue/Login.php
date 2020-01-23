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
    </head>
    <body>
        <div class="container">
        <header class="jumbotron">
        
      
        <h1 class="header">Connexion</h1>
        </header>
        </div>
 <div class="container">
 
     <form class="form-horizontal" action="../controller/traitementlogin.php" method="post">
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
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
        </div>
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
