<?php

session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>inscription</title>
        <link rel ="stylesheet" href=  "../style/style1.css"/>
    </head>
    <body>
        <header><h1>inscription<h1></header>
      <form name="inscription" id="inscription" method="post"
      action="traitement.php?type=inscription" enctype="multipart/form-data">
 <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
 <input type="hidden" name="info" id="info" value="inscription">       <fieldset>    
    <label for="nom">Nom:
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
    <label for="prenom">Prénom:
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
    <label for="email">Email:
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
                        <label for="poste">
                            votre poste?
         <select name="poste" id="poste" size="1">
         <option value="">--------</option>
         <option value="Gardien"
             <?php
             if(isset($_SESSION['encodage']['profession']) && $_SESSION['encodage']['profession'] == "Gardien") echo "selected";
             ?>
         >Gardien</option>
         <option value="Défenseur"
             <?php
             if(isset($_SESSION['encodage']['profession']) && $_SESSION['encodage']['profession'] == "Defenseur") echo "selected";
             ?>
         >Défenseur</option>
         <option value="milieu"
             <?php
             if(isset($_SESSION['encodage']['profession']) && $_SESSION['encodage']['profession'] == "Milieu") echo "selected";
             ?>
         >milieu</option>
         <option value="Attaquant"
             <?php
             if(isset($_SESSION['encodage']['profession']) && $_SESSION['encodage']['profession'] == "Attaquant") echo "selected";
             ?>
        >Attaquant</option>
     </select>
        <span class="error">
              <?php
              if(isset($_SESSION['error']['profession'])) { echo $_SESSION['error']['profession']; }
              ?>
        </span>
    </label>
                    </fieldset>
                    <fieldset>
                        <input type="date" name="anniversaire">
                        <?php
                       if(isset($_SESSION['error']['anniversaire'])) {echo($_SESSION['error']['anniversaire']);}
             ?>
                    </fieldset>
                    <fieldset>
        <legend>votre login et password</legend>
        <label for="login">votre Login:
            <input type="text" name="login" id="login" size="10" maxlength="20"
                   placeholder="login"  title="votre login">
        </label>
        <span class="error">
        <?php
        if(isset($_SESSION['error']['login'])) { echo $_SESSION['error']['login']; }
        ?>
         </span>
        <br><br>
        <label for="password">votre Password:
            <input type="password" name="password" id="password" size="10" maxlength="20"
                   placeholder="password"  title="votre password">
        </label>
        <br><br>
        <label for="password2">confirmez votre Password:
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
        <legend>votre acceptation</legend>
        <label for="autorisation">
            <!-- input type checkbox coché par défaut optin -->
            <input type="checkbox" name="autorisation" id="autorisation" unchecked="checked" value="0">
            Acceptez-vous que l'on transmette vos données à nos partenaires commerciaux? ...
        </label>
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
    </body>
</html>
