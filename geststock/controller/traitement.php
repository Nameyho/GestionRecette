<?php

require '../DAO/MyPdo.php';
require '../DAO/Parameters.php';
require '../DAOEntities/UtilisateurDAO.php';
require '../Entities/Utilisateur.php';


ini_set("session.gc_maxlifetime","600");

session_start();


if ( !( isset($_POST['submit']) && $_POST['submit'] == "envoyer" ) )
    // redirection si appel direct de la page
header("Location:../vue/inscription.php");
else {
     extract($_POST); 
    $_SESSION['encodage'] = array();
    // les champs obligatoires
    $_SESSION['encodage']['nom'] = $nom;
    $_SESSION['encodage']['prenom'] = $prenom;
    $_SESSION['encodage']['email'] = $email;
    $_SESSION['encodage']['login'] = $login;
   
    
    
    
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
    
    echo $password;
    echo $password2;
    
    $hash = password_hash($password, PASSWORD_DEFAULT);
   
    $error= array();


    
    
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
    
 
     
    if (empty($login)) {
        $error['login'] = "le login est obligatoire ";
        
    } 
    
      if (empty($password)) {
        $error['password'] = "le mot de passe est obligatoire";
    }
    
      if (empty($password2)) {
        $error['password2'] = "le mot de passe est obligatoire";
    }

    if(!( password_verify ( $password2 ,  $hash ))){
        $error['password']= "les mot de passes doivent être similaire";
        
    }
    
    
      if ( count($error) != 0 ) {
        $_SESSION['error'] = $error;
        
      header("Location:../vue/inscription.php");
        exit();
    }
       
        
        
        $code=md5(uniqid(rand(), true));
        $_SESSION['inscription']['code'] = $code;
    try{
        $_SESSION['nom']= $nom;
        $_SESSION['prenom']= $prenom;
        $_SESSION['email']= $email;
        
        $u = new Utilisateur();
        $u->setNom($nom);
        $u->setPrenom($prenom);
        $u->setEmail($email);
        $u->setLogin($login);
        $u->setMdp($hash);
        $u->set_code($code);
        
         $mypdo = null;
         $pdo = null;
         MyPdo::setParameters(Parameters::DSN,Parameters::USER,Parameters::PASSWORD);
         $mypdo = MyPdo::getInstanceSingleton();


         $pdo = $mypdo->getPdo();
         $ud= new UtilisateurDAO($pdo);
         $err =$ud->insert($u);
         
         if(($err == 1062)){
             echo $err;
            $_SESSION['dupliquer'] = "login déjà existant"; 
             header("Location:../vue/inscription.php");
             exit();
         }
         

    } catch (Exception $ex) {

         echo 'echoue';
    }
    //redirection vers la page envoiMail.php
   header("Location:../mailer/envoiMail.php");
}

