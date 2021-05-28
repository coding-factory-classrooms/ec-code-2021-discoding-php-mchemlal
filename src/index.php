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



    
$user_id = $_SESSION['user_id'] ?? false;
var_dump($user_id);
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
             break;
        
        case 'contact_user':
            formContact();

            if (!empty($_POST)){ 
              sendMail();
            }
            break;

        case 'activate': 
            activate();
            break;

        case 'logout':
            logout();
            break;

        case 'conversation':
            conversationPage();
                if ( !empty( $_POST ) ) {messageDelete( $_POST );}
            break;

        case 'friend':
            friendPage();
            break;
    }
} else {
    

    if ($user_id){
        friendPage();
    } else {
        header('Location:index.php?action=login');
    }
}
