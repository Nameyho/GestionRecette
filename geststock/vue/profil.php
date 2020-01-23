<?php
session_start();
?>


<!DOCTYPE html>



<html>
    <head>
        <meta charset="UTF-8">
        <title>profil</title>
        
        
        <link rel="stylesheet" href="../style/bootstrap.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/script.js"></script>
        <link rel ="stylesheet" href=  "../style/style1.css"/>
    </head>
    <body>
    <div class="container">
    <header class="jumbotron">
    <h1 class="header"> votre profil</h1>
    </header>
    </div>
 <div class="container">
  <h2>Gestion Profil</h2>
  </div>
   <div class="container">     
  <p>Que souhaitez-vous faire ?</p>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">gestion
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">supprimer en effacant ses recettes</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">supprimer en laissant ses recettes</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">desactiver son compte</a></li>
    </ul>
  </div>

      
  <div class="remplir">
      
  </div>
   </div>
    </div>
        
        
        
        
  
    </body>
