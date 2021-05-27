<?php

ini_set('display_errors','on');
error_reporting(E_ALL);

date_default_timezone_set('Europe/Paris');

require_once('controller/conversationController.php');
require_once('controller/friendController.php');
require_once('controller/loginController.php');
require_once('controller/signupController.php');
require_once('controller/activationController.php');
require_once('controller/contactUserController.php');



if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'login':
            if (!empty($_POST)) {
                login($_POST);
              
            } else {
                loginPage();
            }
            break;

        case 'signup':
             if (!empty($_POST)) {
                signup($_POST);
            }else{
                signupPage();
            }
            var_dump($_POST);          
             break;
        
        case 'contact_user':

            if (!empty( $_POST)) : 
                sendMail($_POST );
            else : 
              formContact();
            endif;
            break;

        case 'activate': 
            activate();
            break;

        case 'logout':
            logout();
            break;

        case 'conversation':
            conversationPage();
            break;

        case 'friend':
            friendPage();
            break;
    }
} else {
    
    
    
    $user_id = $_SESSION['user_id'] ?? false;
    var_dump($user_id);

    if ($user_id){
        var_dump($user_id);
        friendPage();
    } else {
        loginPage();
    }
}
