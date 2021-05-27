<?php

require_once( 'model/user.php' );


function signupPage(){
    $user = new stdClass();
    $user->id = $_SESSION['user_id'] ?? false;
    require('view/signupView.php');
}


function signup($post){
            $data = new stdClass();
            // on remplit les attributs de cet objet data avec les champs formulaires
            $data->username    = isset($post['username']) ? htmlspecialchars(strip_tags($post['username'])) : null;
            $data->email    = isset($post['email']) ? htmlspecialchars(strip_tags($post['email'])) : null;
            $data->password = isset($post['password']) ? htmlspecialchars(strip_tags($post['password'])) : null;
            $data->active_key = htmlspecialchars(strip_tags(User::generateKey()));
            $data->isActive = 0;
            $confirmPass = isset($post['password_confirm']) ? htmlspecialchars(strip_tags($post['password_confirm'])) : null;

            $user = new User( $data );


        //si le formulaire est rempli
        if( $data->email != null || $data->password != null || $confirmPass != null|| $data->username != null){
            // si le confirm est egal au password user 
            if( $user->getPassword() == $confirmPass){
                // si adresse dispo
                if($user->createUser()){                            //getkey
                    Message::sendActivationMail($user->getEmail(), $user->getActiveKey());
                    $msg ="Vous allez recevoir un mail pour activer votre compte";
                }else{

                    $msg ="Ce compte existe déjà, réessayez";
                }
             }else{
                 $msg = 'les mots de passes ne correspondent pas';
             }
        }else{
            $msg ="Veuillez remplir tous les champs!";
        }

        require('view/signupView.php');
}
?>