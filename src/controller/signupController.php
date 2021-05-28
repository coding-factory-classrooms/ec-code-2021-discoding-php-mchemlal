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
            $data->avatar_url = isset($post['avatar_url']) ? htmlspecialchars(strip_tags($post['avatar_url'])) : null;
            $data->password = isset($post['password']) ? htmlspecialchars(strip_tags($post['password'])) : null;
            $data->active_key = htmlspecialchars(strip_tags(User::generateKey()));
            $data->isActive = 0;
            $confirmPass = isset($post['password_confirm']) ? htmlspecialchars(strip_tags($post['password_confirm'])) : null;

            $user = new User( $data );


        //si le formulaire est rempli
        if( $data->avatar_url != null || $data->email != null || $data->password != null || $confirmPass != null|| $data->username != null){
            // si le confirm est egal au password user 
            if( $user->getPassword() == $confirmPass){
                // si adresse dispo
                if($user->createUser()){                            //getkey
                    Message::sendActivationMail($user->getEmail(), $user->getActiveKey());
                    $msg ="We have just sent you an activation email";
                }else{

                    $msg ="This account already exist";
                }
             }else{
                 $msg = 'both passwords don\'t match';
             }
        }else{
            $msg ="Make sure you fill into every field!";
        }

        require('view/signupView.php');
}
?>