<?php
require 'JoueursDao.php';
require 'Joueurs.php';
require 'MyPdo.php';
require 'Parameters.php';

ini_set("session.gc_maxlifetime","600");

session_start();


if ( !( isset($_POST['submit']) && $_POST['submit'] == "envoyer" ) )
    // redirection si appel direct de la page
header("Location:inscription.php");
else {
     extract($_POST); 
    $_SESSION['encodage'] = array();
    // les champs obligatoires
    $_SESSION['encodage']['nom'] = $nom;
    $_SESSION['encodage']['prenom'] = $prenom;
    $_SESSION['encodage']['email'] = $email;
    $_SESSION['encodage']['poste'] = $poste;
    $_SESSION['encodage']['login'] = $login;
    $_SESSION['encodage']['anniversaire']=$anniversaire;
    
    $bool =true;
    
    $pattern_nom = "#^[a-z]+$#i";
    $pattern_prenom = "#^[a-z]+$#i";
    $pattern_email = "#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i";
    
    // enlever les espaces devant et derrière la chaôine de caractères
    $nom = trim($nom);
    $prenom = trim($prenom);
    $email = trim($email);
    $login = trim($login);
    $password = trim($password);
    $password2 = trim($password2);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $password2 = password_hash($password, PASSWORD_DEFAULT);
    $acceptation= false;
    
    
    if (empty($nom)) {
        $error['nom'] = "le nom est obligatoire";
    } else if (preg_match($pattern_nom, $nom) == 0) {
        $error['nom'] = "le nom est obligatoire, syntaxe incorrecte";
    }

    
    if (empty($prenom)) {
        $error['prenom'] = "le prénom est obligatoire";
    } else if (preg_match($pattern_prenom, $prenom) == 0) {
        $error['prenom'] = "le prénom est obligatoire, syntaxe incorrecte";
    }

 
     if (empty($email)) {
        $error['email'] = "l'email est obligatoire";
    } else if (preg_match($pattern_email, $email) == 0) {
        $error['email'] = "l'email est obligatoire, syntaxe incorrecte";
    }
    
      if ((empty($anniversaire))) {
        $error['anniversaire'] = "la date est obligatoire";
    } 
    
     
    if (empty($nom)) {
        $error['nom'] = "le nom est obligatoire";
    } else if (preg_match($pattern_nom, $nom) == 0) {
        $error['nom'] = "le nom est obligatoire, syntaxe incorrecte";
    }

     
    if (empty($login)) {
        $error['login'] = "le nom est obligatoire";
    } else if (preg_match($pattern_nom, $nom) == 0) {
        $error['login'] = "le login est obligatoire, syntaxe incorrecte";
    }
    
      if (empty($password)) {
        $error['password'] = "le mot de passe est obligatoire";
    } else if (preg_match($pattern_prenom, $nom) == 0) {
        $error['password'] = "le mot de passe est obligatoire, syntaxe incorrecte";
    }
    
      if (empty($password2)) {
        $error['password2'] = "le mot de passe est obligatoire";
    } else if (preg_match($pattern_prenom, $nom) == 0) {
        $error['password2'] = "le mot de passe est obligatoire, syntaxe incorrecte";
    }

    if(!( $password == $password2)){
        $error['password']= "les mot de passes doivent être similaire";
    }
    
      /*if ( count($error) != 0 ) {
        $_SESSION['error'] = $error;
        header("Location:inscription.php");
        exit();
    }*/
        $j = new joueurs();
        $j->setNom($nom);
        $j->setPrenom($prenom);
        $j->setAnniversaire($anniversaire);
        $j->setPoste($poste);
        $j->setLogin($login);
        $j->setMdp($password);
        $j->setEmail($email);
        $j->setAcceptation($acceptation);
        
        
        $code=md5(uniqid(rand(), true));
        $_SESSION['inscription']['code'] = $code;
    try{

         $mypdo = null;
         $pdo = null;
         MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
         $mypdo = MyPdo::getInstanceSingleton();


         $pdo = $mypdo->getPdo();
         var_dump($pdo);
         $i = new JoueursDao($pdo);
         $i->insert($j);

    } catch (Exception $ex) {

         echo 'echoue';
    }
   // redirection vers la page envoiMail.php
   header("Location:envoiMail.php");
}

