<?php

require_once('model/user.php');

        /****************************************
     * ----- FUNCTION ACTIVATE -----
     *****************************************/
    /**
     * activate
     *
     * @return void
     */
    function activate(){
        if(isset($_GET['key']) && isset($_GET['email'])): 

        $data = new stdClass();
        $data->email = $_GET['email'];
        $data->active_key = $_GET['key'];
          
        $user           = new User( $data );
        $userData       = $user->getUserByEmail($data->email);
      
            if(!$user->checkKey($user->getEmail(), $user->getActiveKey())): 
              $message = 'Your account is already activated';
            else : 
              $message = 'Your account is now activated';
            endif;
        endif;

        require('view/activationView.php');
    }

?>