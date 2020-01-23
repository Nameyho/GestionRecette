<?php
session_start();

/*
 * vérifier si l'internaute accède directement à cette page ?
 * tester avec un HTTP_REFERER ??
 */

// code pour envoyer un mail avec un serveur SMTP et sans authentification
// attacher les fichiers source pour la classe phpmailer
require_once("../mailer/PhpMailer.php");
require_once("../mailer/Smtp.php");
require_once("../mailer/PhpMailerException.php");
require_once("../mailer/config_smtp.php");

header("Location:../vue/accueil.php");
$email = new PHPMailer(true);                     // true : Active les exceptions
var_dump($_SESSION);


try {
                    // Configuration du serveur
                    $email->SMTPDebug = 2;                                  // Enable verbose debug output
                    $email->isSMTP();    
                 //   $email->isMail();// Set mailer to use SMTP
                    $email->Host = 'smtp-mail.outlook.com';               // Specify main and backup SMTP servers
                    $email->SMTPAuth = true;                                // Enable SMTP authentication
                    $email->Username = 'benjamin.infb@outlook.fr';          // SMTP utilisateur
                    $email->Password = 'Benjamin7350';                        // SMTP mot de passe
                    $email->SMTPSecure = 'tls';
                    $email->Port = 587;                                     // TCP port to connect to
// Adresses (Emetteur / Destinataire)
                    $email->setFrom('benjamin.infb@outlook.fr', 'test');
                    $email->addAddress($_SESSION['email'], $_SESSION['nom'] . " " . $_SESSION['prenom']);

                    // Contenu du mail
                    $email->isHTML(true);                                  // Set email format to HTML
                   $messBody = "";
$messBody .= "<strong> merci pour votre inscription sur notre site Web </strong>";
$messBody .= "<br> voici les données que vous avez encodées au moyen de notre formulaire d'inscription <br>";
$messBody .= "Nom : " . $_SESSION['encodage']['nom'] . "<br>";
$messBody .= "Prénom : " . $_SESSION['encodage']['prenom'] . "<br>";
$messBody .= "Email : " . $_SESSION['encodage']['email'] . "<br>";
// continuer à récupérer les valeurs ...
$messBody .= "<br>";
// préparation du lien ancre pour la confirmation ...
// A modifier si nécessaire
$messBody .= "veuillez confirmer votre inscription au moyen de ce lien: <br>";
$messBody .= "<a href='http://localhost/geststock/vue/confirmation.php?code=" . $_SESSION['inscription']['code']. "&login=" . $_SESSION['encodage']['login'] . "'> confirmer votre inscription SVP ... </a>";
$messBody .= "<br>A bientôt.";

$email->Subject = "votre inscription sur notre site Web";
$email->Body = "<html><body>" . $messBody . "</body></html>";

                 
   
$mail_destinataire = $_SESSION['encodage']['email'];
$messBody = "";
$messBody .= "<strong> merci pour votre inscription sur notre site Web </strong>";
$messBody .= "<br> voici les données que vous avez encodées au moyen de notre formulaire d'inscription <br>";
$messBody .= "Nom : " . $_SESSION['encodage']['nom'] . "<br>";
$messBody .= "Prénom : " . $_SESSION['encodage']['prenom'] . "<br>";
$messBody .= "Email : " . $_SESSION['encodage']['email'] . "<br>";
// continuer à récupérer les valeurs ...
$messBody .= "<br>";
// préparation du lien ancre pour la confirmation ...
// A modifier si nécessaire
$messBody .= "veuillez confirmer votre inscription au moyen de ce lien: <br>";

$messBody .= "<br>A bientôt.";                 

                    $email->send();
                    ?>
                    <div class="alert alert-success">Un email de validation vous a été envoyé pour finaliser votre inscription !</div>
                    <?php
                } catch (Exception $e) {
                   ?>
                  <div class="alert alert-success">L'email de validation n'a pas pu vous être envoyé, veuillez contacter un administrateur. Mailer Error: <?php $email->ErrorInfo; ?></div>
                   <?php
               }





?>