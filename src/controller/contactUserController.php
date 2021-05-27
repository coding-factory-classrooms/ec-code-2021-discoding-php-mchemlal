<?php
require_once( 'model/user.php' );
//require_once( 'model/Media.php' );
require_once( 'model/message.php' );

function sendMail(){

    if(!empty($_POST)){
    $expediteur= $_POST['expediteur'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];

    $message_erreur = null;

    //form validation, returning $error_msg or $success_msg to the user

    if(empty($expediteur)){
        $message_erreur =  "Le nom ne peut pas être vide";
     }
    elseif(empty($objet)) {
        $message_erreur =  "Le mail ne peut pas être vide";
     }
     elseif(empty($message)){
        $message_erreur = "le corps du message ne peut pas être vide";
    }
    elseif(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $expediteur)){
        $message_erreur = "Le mail n'est pas valide";
    }
    else{
        $success_msg = "Le mail a bien été envoyé";
        $_POST['success_msg'] = $success_msg;

    }


    $mail = htmlspecialchars(strtolower($expediteur));

    $formcontent="From: $expediteur \n Message: $message";
    $recipient = "contact@discoding.com";
    //$subject = "Contact Form";
    $subject = $objet;
    $mailheader = "From: $expediteur \r\n";
    $headers  = 'From:'.$expediteur.' <'.$objet.'>' . "\r\n";

    //mail()function 
    mail($recipient, $subject, $formcontent, $headers) or die("Error!");

    $_POST['error_msg'] = $message_erreur;}
    require('view/contactView.php');
}  



function formContact(){
    // A revoir pour adapter au formulaire de contact interne avec la fonction du haut 

$user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

if(isset( $user_id)){
    $data = new stdClass();
    $data->id = $user_id;

    $user = new User($data);
    $userData = $user->getUserById($user->getId());

    $emailDeSession =  isset($userData['email']) ? $userData['email'] : '';
    
    }
     require('view/contactView.php');

}