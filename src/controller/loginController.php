<?php

session_start();

require_once('model/user.php');

/****************************
 * ----- LOAD LOGIN PAGE -----
 ****************************/

function loginPage()
{
    $user = new stdClass();
    $user->id = $_SESSION['user_id'] ?? false;
    require('view/loginView.php');
}

/***************************
 * ----- LOGIN FUNCTION -----
 ***************************/

function login($post)
{
$data = new stdClass();
  $data->email    = htmlspecialchars(strip_tags($post['email']));
  $data->password = User::hash(htmlspecialchars(strip_tags($post['password'])));

  $user = new User( $data );
  $userData = $user->getUserByEmail($data->email );

  if(!empty($userData)){
      if( $user->getPassword() == $userData['password'] ){
          if($userData['active'] == 1) {
              // Set session
              $_SESSION['user_id'] = $userData['id'];
              header('Location:index.php');
          }else{
            $msg = "Vous devez activer votre compte";
          }
        }else{
            $msg = "Les informations ne sont pas reconnues";
        }
    }else{
    $msg = "Remplir tous les champs";
    }
    require('view/loginView.php');
}

/****************************
 * ----- LOGOUT FUNCTION -----
 ****************************/

function logout()
{
    $_SESSION = array();
    session_destroy();

    header('location: index.php');
}
