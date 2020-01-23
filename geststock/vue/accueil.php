<?php

session_start();


?>


<!DOCTYPE html>
<html>
       <head>
	         <!----En-tête de la page-->
			<meta charset="utf-8" />
			<title>Livre de recette</title>
			<link rel ="stylesheet" href=  "../style/bootstrap.min.css"/>
                        <link rel ="stylesheet" href=  "../style/style.css"/>
              		</head>
		 <body> 
                     <div class="container">
                       
                       <nav>
                       <div>
                           
                       
                       <ul class="nav">
                       <li><a href="#">Accueil</a></li>
                       <li><a href="../vue/login.php">Se connecter </a></li>
                       <li><a href="../vue/rechercherecette.php">rechercher recette</a></li>
                       <li><a href="../vue/listing.php">Afficher recette</a></li>
                      
                       
                       <?php
                        if(isset($_SESSION['co'])){
                        if($_SESSION['co']==false){
                           echo ' <li><a href="#">inscription</a></li>';
                           echo '<li><a href="Login.php">Login</a></li>';
                                   
                                   
                        }else
                        {
                            echo '<li><a href="../controller/deconnection.php"> deconnection</a></li>';
                       }}
                       ?>
                       </ul>
                        <header class="jumbotron">
                             <h1>Livre de recettes</h1>
                             <h3>
                             <?php
                                                
                              if(isset($_SESSION['co'])){
                             if($_SESSION['co']==true){
                             echo 'bienvenue'  ."   " .$_SESSION['login'];
                              }}
                             ?></h3>
                         </header>
                     

                     </nav>
                   </div>
                         
                             
  
      <?php
      if(isset($_SESSION['co'])){ 
          if($_SESSION['co']==true){
     echo '<div class="row">';
     echo '<div class="col-sm-12">';
     echo '<h3> <a href="profil.php">profil </a> </h3>';
     echo '<p></p>';
     echo '<p>gérer son profil</p>';
     echo '</div>';
     echo '<div class="col-sm-12">';
     echo '<p></p>';
     echo '<p>Ajouter/supprimer une ou plusieurs recettes dans la liste</p>';
     echo '</div>';
     echo '<div class="col-sm-12">';
     echo '<h3> <a href="inscriptionAliment.php"> gérer ses aliment </a> </h3>';
     echo '<p></p>';
     echo '<p>Ajouter/supprimer un ou plusieurs aliment dans la liste</p>';
     echo '</div>';
     echo '<div class="col-sm-12">';
     echo ' <h3><a href="Listing.php"> Afficher les recettes publiées</a></h3>';        
     echo ' <p></p>';
     echo '<p>Accéder à un listing</p>';
     echo '</div>';
     echo '</div>';
     echo '</div>'; 
              }else{
  connecter();
              }
          
      }else{
      connecter();
      }

       function connecter(){
         echo '<div class="col-sm-12">';
     echo '<h3> <a href="inscription.php">S\'inscrire</a> </h3>';
     echo '<img src="../images/bouton.png" alt="bouton">';
 
     echo '</div>';
     echo '<div class="col-sm-12">';
     echo '<h4><a href="login.php">Se connecter </a> </h3>';

     echo '</div>';
     echo '</div>';
     echo '</div>'; 
      }
                       ?>
      
   

  

                     </div>      
                         
                         
                    
			  
			  
			  </body>
	    
</html>