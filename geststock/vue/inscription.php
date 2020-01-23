<?php

session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>inscription</title>
        <link rel ="stylesheet" href=  "../style/bootstrap.min.css"/>
        <link rel ="stylesheet" href=  "../style/style1.css"/>
    </head>
    <body>
       <div class="container">
                         <header class="jumbotron">
                             <h1 class="header">Inscription</h1>
       </div>
       <div class="container">
      <form name="inscription" id="inscription" method="post"
            action=../controller/traitement.php?type=inscription" enctype="multipart/form-data">
 <input type="hidden" name="info" id="info" value="inscription">       <fieldset>    
    <label for="nom">Nom :
    <input type="text" name="nom" id="nom" size="50" maxlength="50"
           placeholder="votre nom"  title="votre nom"
           value="<?php
           if(isset($_SESSION['encodage']['nom'])) echo $_SESSION['encodage']['nom'];
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
    <label for="prenom">Prenom :
    <input type="text" name="prenom" id="prenom" size="50" maxlength="50"
           placeholder="votre prénom"  title="votre prénom"
           value="<?php if(isset($_SESSION['encodage']['prenom'])){ echo $_SESSION['encodage']['prenom'];}?>" >
        <span class="error">
          <?php
          if(isset($_SESSION['error']['prenom'])) { echo $_SESSION['error']['prenom']; }
          ?>
        </span>
    </label>
    <br><br>
    <label for="email">Email :
    <input type="text" name="email" id="email" size="50" maxlength="100"
           placeholder="votre email"  title="votre email"
           value="<?php if(isset($_SESSION['encodage']['email'])) echo $_SESSION['encodage']['email'];?>">
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
        <label for="login">votre Login :
            <input type="text" name="login" id="login" size="10" maxlength="20"
                   placeholder="login"  title="votre login">
        </label>
        <span class="error">
        <?php
        if(isset($_SESSION['error']['login'])) { echo $_SESSION['error']['login']; }
        
        if(isset($_SESSION['dupliquer'])) { echo $_SESSION['dupliquer']; }
        ?>
         </span>
        <br><br>
        <label for="password">votre Password :
            <input type="password" name="password" id="password" size="10" maxlength="20"
                   placeholder="password"  title="votre password">
        </label>
        <br><br>
        <label for="password2">confirmez votre Password :
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
        </div>
    </body>
</html>
