<?php

require_once('model/user.php');


    function activate(){
        if(isset($_GET['key']) && isset($_GET['email'])): 

            $data = new stdClass();
            $data->email = $_GET['email'];
            $data->active_key = $_GET['key'];
          
            $user           = new User( $data );
            $userData       = $user->getUserByEmail($data->email);
      
            if(!$user->checkKey($user->getEmail(), $user->getActiveKey())): 
              $message = 'Votre compte est deja activé';
            else : 
              $message = 'Votre compte est desormais actif';
            endif;
          endif;

        require('view/activationView.php');
    }

    //require_once('model/User.php');


    // function activate(){
    //     if(isset($_GET['key']) && isset($_GET['email'])): 

    //         $data = new stdClass();
    //         $data->email = $_GET['email'];
    //         $data->key = $_GET['key'];
          
    //         $user           = new User( $data );
    //         $userData       = $user->getUserByEmail($data->email);
      
    //         if(!$user->checkKey($user->getEmail(), $user->getKey())): 
    //           $message = 'Votre compte est deja activé';
    //         else : 
    //           $message = 'Votre compte est desormais actif';
    //         endif;
    //       endif;

    //     require('view/activationView.php');
    // }
?>