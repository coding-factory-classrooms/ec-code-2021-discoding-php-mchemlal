<?php

require_once('conversationController.php');

function friendPage()
{
    $user_id = $_SESSION['user_id'] ?? false;
    if (!$user_id) {
        require('view/loginView.php');
        return;
    }

    $sub_action = $_GET['sub_action'] ?? '';
    switch ($sub_action) {
        case 'add_friend':
            addFriend($user_id);
            break;
        default:
            displayFriends($user_id);
            break;
    }
}

function addFriend($user_id)
{
    $message = '';
    $username = $_POST['username'] ?? '';
    if (!empty($username)) :
        // FIXME What happens if the user does not exist?
            $newFriend = User::findUserWithUsername($username);
            var_dump($newFriend);
            if($newFriend != false):
        
                if (User::isAlreadyFriend($user_id, $newFriend['id'])) :
                    $message = 'You are already friend with ' . $newFriend['username'] . ' !';
                else :
                    User::addFriend($user_id, $newFriend['id']);
                    $message = 'Friend ' . $newFriend['username'] . ' added !';
                endif;
            else:
                $message = 'user not found!';
            endif;
    endif;
    
 
     

    $conversation_list_partial = conversationListPartial($user_id);
    require('view/friendAddView.php');
}

function displayFriends($user_id){
    $user_data = User::getUserById($user_id);
    $search = isset( $_GET['username'] ) ? $_GET['username'] : null;


    $users = User::filterUsers( $search );
    $friends = User::getFriendsForUser($user_id);
    $conversation_list_partial = conversationListPartial($user_id);
    require('view/friendView.php');
}

// function searchFriend($post){
//     echo 'salut ouais';
// require 'view/friendView.php';  
// }

// function displayFriends($user_id)
// {
//     $user_data = User::getUserById($user_id);
//     $search = isset( $_GET['username'] ) ? $_GET['username'] : null;

//     $users = User::filterUsers( $search );
//     $friends = User::getFriendsForUser($user_id);
//     $conversation_list_partial = conversationListPartial($user_id);
//     require('view/friendView.php');
// }