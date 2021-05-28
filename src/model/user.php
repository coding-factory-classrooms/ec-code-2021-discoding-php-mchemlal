<?php

require_once('database.php');

class User
{
    
    /**
     * attributes
     *
     * @var mixed
     */
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $active_key;
    protected $isActive;
    protected $avatar_url;


        
    /**
     * __construct
     *
     * @param  mixed $user
     * @return void
     */
    public function __construct( $user = null ) {
        if( $user != null ):
          $this->setId( isset( $user->id ) ? $user->id : null );
          $this->setUsername( isset( $user->username ) ? $user->username : null );
          $this->setEmail( isset($user->email) ? $user->email : null );
          $this->setPassword( isset( $user->password ) ? $user->password : null );
          $this->setActiveKey( isset($user->active_key) ? $user->active_key  : null);
          $this->setActive( isset($user->isActive) ? $user->isActive : null );
          $this->setAvatarUrl( isset($user->avatar_url) ? $user->avatar_url : null );
        endif;
      }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username.'#'.rand(1000,9999);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


    /**
     * @return mixed
     */
    public function getActiveKey()
    {
        return $this->active_key;
    }

    /**
     * @param mixed $password
     */
    public function setActiveKey($active_key)
    {
        $this->active_key = $active_key;
    }

    
    public function getActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $password
     */
    public function setActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getAvatarUrl()
    {
        return $this->avatar_url;
    }

    /**
     * @param mixed $avatar_url
     */
    public function setAvatarUrl($avatar_url)
    {
        $this->avatar_url = $avatar_url;
    }


    /**************************************
     * -------- GET USER DATA BY ID --------
     ***************************************/
    /**
     * getUserById 
     *
     * @param  mixed $id
     * @return void
     */
    public static function getUserById($id)
    {
        
        $db = init_db();

        $req = $db->prepare("SELECT * FROM users WHERE id = ?");
        $req->execute([$id]);

        
        $db = null;

        return $req->fetch();
    }


    /**************************************
     * -------- GET USER DATA BY EMAIL --------
     ***************************************
    /**
     * getUserByEmail
     *
     * @param  mixed $email
     * @return void
     */
    public static function getUserByEmail($email)
    {
        // Open database connection
        $db = init_db();

        $req = $db->prepare("SELECT * FROM users WHERE email = ?");
        $req->execute(array($email));

        // Close database connection
        $db = null;

        return $req->fetch();
    }


    /***************************************
     * ------- GET USER DATA BY CREDENSCIALS -------
     ****************************************/
    /**
     * getUserByCredentials
     *
     * @param  mixed $email
     * @param  mixed $password
     * @return void
     */
    public static function getUserByCredentials($email, $password)
    {
        
        $db = init_db();

        $req = $db->prepare("SELECT * FROM users WHERE email=? AND password=?");
        $req->execute([
            $email,
            $password
        ]);
      
        $db = null;

        return $req->fetch();
    }

    
    /**************************************
     * -------- GET FRIENDS FOR USERS --------
     ***************************************/
    /**
     * getFriendsForUser
     *
     * @param  mixed $user_id
     * @return array
     */
    public static function getFriendsForUser($user_id): array
    {
        // Open database connection
        $db = init_db();

        $req = $db->prepare("SELECT users.* FROM users LEFT JOIN friends ON users.id = friends.friend_user_id WHERE friends.user_id = ?");
        $req->execute([$user_id]);

        // Close database connection
        $db = null;

        return $req->fetchAll();
    }

    /**************************************
     * -------- FIND USER WITH USERNAME --------
     ***************************************/
    /**
     * findUserWithUsername
     *
     * @param  mixed $username
     * @return void
     */
    public static function findUserWithUsername($username)
    {
        // Open database connection
        $db = init_db();

        $req = $db->prepare("SELECT * FROM users WHERE username = ?");
        $req->execute([$username]);

        // Close database connection
        $db = null;

        return $req->fetch();
    }


    /**************************************
     * -------- ISALREADY FRIENDS --------
     ***************************************/
    /**
     * isAlreadyFriend
     *
     * @param  mixed $user_id
     * @param  mixed $friend_id
     * @return void
     */
    public static function isAlreadyFriend($user_id, $friend_id)
    {
        // Open database connection
        $db = init_db();

        $req = $db->prepare("SELECT COUNT(*) FROM friends WHERE (user_id = ? AND friend_user_id = ?) OR (user_id = ? AND friend_user_id = ?)");
        $req->execute([
            $user_id,
            $friend_id,
            $friend_id,
            $user_id
        ]);

        $isAlreadyFriend = $req->fetchColumn() > 0;

        // Close database connection
        $db = null;

        return $isAlreadyFriend;
    }


    
    /**************************************
     * -------- ADD FRIENDS --------
     ***************************************/
    /**
     * addFriend
     *
     * @param  mixed $user_id
     * @param  mixed $friend_id
     * @return void
     */
    public static function addFriend($user_id, $friend_id)
    {
        // Open database connection
        $db = init_db();

        $req = $db->prepare("INSERT INTO friends VALUES (NULL, ?, ?)");
        $req->execute([
            $user_id,
            $friend_id
        ]);

        $id = $db->lastInsertId();
        // Close database connection
        $db = null;

        return $id;
    }

    
    /**************************************
     * -------- CREATE USER --------
     ***************************************/
    /**
     * createUser
     *
     * @return void
     */
    public function createUser() {
        $db = init_db();
        
        // Check if email already exist
        $req  = $db->prepare( "SELECT * FROM users WHERE email = ? " );
        $req->execute( array( $this->getEmail()));
    
        if( $req->rowCount() > 0 ) :
          return false;
        else : 
          $req->closeCursor();
          // Insert new user
          $req  = $db->prepare( "INSERT INTO users ( email, username, password, activation_key, active, avatar_url ) 
                                    VALUES (:email,  :username, :password, :active_key, :activate, :avatar_url)" );
          $req->execute(array(
            'username' => $this->getUsername(),
            'email'     => $this->getEmail(),
            'password'  => $this->hash($this->getPassword()),
            'active_key' => $this->getActiveKey(),
            'activate' => $this->getActive(),
            'avatar_url' => $this->getAvatarUrl()
            ));
          return true;
        endif;
      }

      /**************************************
     * -------- GENERATE KEY --------
     ***************************************/
      /**
       * generateKey
       *
       * @return void
       */
      public static function generateKey(){
        $db = init_db();

        $generKey = md5(microtime(TRUE)*1000);
        return $generKey;
      }

      
      /**************************************
     * -------- HASH --------
     ***************************************/
      /**
       * hash
       *
       * @param  mixed $password
       * @return void
       */
      public static function hash($password) {
        $begin_password = substr($password, 3, strlen($password));
        $end_password   = substr($password, 0,3);
    
        $salt = $begin_password.$password.$end_password;
        return hash('sha256', $salt);
      }

      
    /**************************************
     * -------- CHECK KEY --------
     ***************************************/
      /**
       * checkKey
       *
       * @param  mixed $email
       * @param  mixed $key
       * @return void
       */
      public function checkKey($email, $key){
        $db = init_db();

        $req  = $db->prepare( "SELECT activation_key, active FROM users 
                                           WHERE email = ?" );
        $req->execute(array($email));
        $row = $req->fetch();
        if($row['active'] == 1 ){
          return false;
        }else{
          if($row['activation_key'] == $key){
            $req->closeCursor();
            $req  =  $db->prepare("UPDATE users SET active = 1 WHERE email = ? ");
            $req->execute(array($email));
            return true;
          }
        }
      }

     /**************************************
     * -------- ADD KEY --------
     ***************************************/
       /**
        * addKey
        *
        * @param  mixed $key
        * @param  mixed $email
        * @return void
        */
       public function addKey($key, $email){
            $db = init_db();
            $req = $db->prepare("UPDATE users SET activation_key = ? WHERE email = ?");
            $req->execute(array($key, $email));
        }


        /**************************************
     * -------- FILTER USERS  --------
     ***************************************/
        /**
         * filterUsers
         *
         * @param  mixed $username
         * @return array
         */
        public static function filterUsers($username = null) : array
        {
            // Open database connection
            $db = init_db();
            $sql = "SELECT * FROM users WHERE ";

            $fields = [];

            if ($username != null) {
                array_push($fields, "username LIKE '%" . $username . "%'");
            }

            if (sizeof($fields) > 0) {
                $sql .= join(" AND ", $fields);
            }
            else {
                $sql .= "1";
            }
            $sql .= " ORDER BY username DESC";

            $req = $db->prepare($sql);
            $req->execute();
            // Close database connection
            $db = null;
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
            
        }
