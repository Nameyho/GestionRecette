<?php

session_start();

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/UtilisateurDAO.php';
require '../Entities/Utilisateur.php';


 $mypdo = null;
$pdo = null;
 MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
 $mypdo = MyPdo::getInstanceSingleton();

 $pdo = $mypdo->getPdo();
$u= new Utilisateur();
$ud = new UtilisateurDAO($pdo);

if(isset($_SESSION['login'])){
    
    $id= $ud->recupid($_SESSION['login']);
    $tab=$ud->find($id);
    
    
    ?>
    <html>
     <form name="inscription" id="inscription" method="post"
            action=../traitement.php?type=inscription" enctype="multipart/form-data">
 <input type="hidden" name="info" id="info" value="inscription">       <fieldset>    
    <label for="nom">Nom:
    <input type="text" name="nom" id="nom" size="50" maxlength="50"
           placeholder="votre nom"  title="votre nom"
           value="<?php
           if(isset($_SESSION['encodage']['nom'])) echo $_SESSION['encodage']['nom'];
           else{
               echo $tab['0']['Nom'];
           }
           ?>" >
        <span class="error">
    <?php
    if(isset($_SESSION['error']['nom'])) {
        echo $_SESSION['error']['nom'];
    }
    ?>
    </span>
    </label>
    <br><br>
    <label for="prenom">Prénom:
    <input type="text" name="prenom" id="prenom" size="50" maxlength="50"
           placeholder="votre prénom"  title="votre prénom"
           value="<?php if(isset($_SESSION['encodage']['prenom'])){ echo $_SESSION['encodage']['prenom'];}
            else{
               echo $tab['0']['prenom'];
           }?>" >
        <span class="error">
          <?php
          if(isset($_SESSION['error']['prenom'])) { echo $_SESSION['error']['prenom']; }
         
          ?>
        </span>
    </label>
    <br><br>
    <label for="email">Email:
    <input type="text" name="email" id="email" size="50" maxlength="100"
           placeholder="votre email"  title="votre email"
           value="<?php if(isset($_SESSION['encodage']['email'])) echo $_SESSION['encodage']['email'];
            else{
               echo $tab['0']['Email'];
           }?>">
        <span class="error">
             <?php
             if(isset($_SESSION['error']['email'])) { echo $_SESSION['error']['email']; }
         
             ?>
        </span>
    </label>
    <br><br>
 </fieldset>

                    <fieldset>
        <legend>votre login et password</legend>
        <label for="login">votre Login:
            <input type="text" name="login" id="login" size="10" maxlength="20"
                   placeholder="login"  title="votre login"
                   value =<?php  
               echo $tab['0']['Login'];
           
        ?>
        </label>
        <span class="error">
        <?php
        if(isset($_SESSION['error']['login'])) { echo $_SESSION['error']['login'];} 
        
        
        if(isset($_SESSION['dupliquer'])) { echo $_SESSION['dupliquer']; }
        ?>
         </span>
        <br><br>
        <label for="password">votre mot de passe:
            <input type="password" name="password" id="password" size="10" maxlength="20"
                   placeholder="password"  title="votre password">
        </label>
        <br><br>
         <label for="password2">Entrez un nouveau mot de passe : 
            <!-- demande confirmation -->
            <input type="password" name="password2" id="password2" size="10" maxlength="20"
                   placeholder="confirmer" title="confirmation password">
        </label>
        <br><br>
        <label for="password2">confirmez votre nouveau mot de passe :
            <!-- demande confirmation -->
            <input type="password" name="password2" id="password2" size="10" maxlength="20"
                   placeholder="confirmer" title="confirmation password">
        </label>
        <span class="error">
        <?php
        if(isset($_SESSION['error']['password'])) { echo $_SESSION['error']['password']; }
        ?>
         </span>
    </fieldset>
         
    <fieldset>
        <legend>votre action</legend>
        <input type="submit" name="submit" id="submit" value="envoyer">
        &nbsp;&nbsp;&nbsp;
        <input type="reset" name="reset" id="reset" value="annuler">
        &nbsp;&nbsp;&nbsp;
        <input type="button" name="help" id="aide" value="aide">
    </fieldset>

</form>
<?php    
}else{
    header('location:profil.php');
}

?>