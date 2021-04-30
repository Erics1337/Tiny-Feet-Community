<?php
class User
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $db;
    private $error;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
        );
  
        // Create PDO instance
        try{
          $this->db = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
          $this->error = $e->getMessage();
          echo $this->error;
        }
    }

    /* ------------------------------ Register user ----------------------------- */
    public function register($data)
    {
        $query = 'INSERT INTO Users (username, email, password) VALUES(:username, :email, :password)';

        $stmt = $this->db->prepare($query);

        // Bind values
        $stmt->bindValue(':username', $data['username']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':password', $data['password']);

        if($stmt->execute()){    
        }
    }

    /* ------------------------------- Login User ------------------------------- */
    public function login($email, $password)
    {
        $query = 'SELECT * FROM Users WHERE email = :email';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':email', $email);

        $stmt->execute();
        $row = $stmt->fetch();

        $hashed_password = $row->password;
        // If password matches hash, return the whole user row and if not return false
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    /* --------------------------- Find if user exists by email --------------------------- */
    public function emailExists($email)
    {
        // From the database library call the query function to prepare statement
        $query = 'SELECT * FROM Users WHERE email = :email';
        // Bind values
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email);

        // Check row if email found
        if ($stmt->rowCount() > 0) {
            return true;
        } else return false;
    }


    /* --------------------------- Find if user exists by email --------------------------- */
    public function usernameExists($username)
    {
        // From the database library call the query function to prepare statement
        $query = 'SELECT * FROM Users WHERE username = :username';
        // Bind values
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $username);

        
        if ($stmt->rowCount() > 0) {
            return true;
        } else return false;

    }

    /* ------------------------------- Get user by id ------------------------------ */
    public function getUserById($id)
    {
        // From the database library call the query function to prepare statement
        $query = 'SELECT * FROM Users WHERE id = :id';
        // Bind values
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }

    /* ------------------------------- Get user by name ------------------------------ */
    public function getUserByName($username)
    {
        // From the database library call the query function to prepare statement
        $query = 'SELECT * FROM Users WHERE username = :username';
        // Bind values
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $username);

        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }

    /* ------------------------------- Get all user names ------------------------------ */
    public function getAllUsersPublicInfo()
    {
        // From the database library call the query function to prepare statement
        $query = 'SELECT username, email, created_at FROM Users';
        $stmt = $this->db->prepare($query);

        $stmt->execute();
        $rows = $stmt->fetchAll();

        return $rows;
    }
}
