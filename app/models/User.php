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

        // $stmt->debugDumpParams();

        if($stmt->execute()){
            return true;
        }   else return false;
    }

    /* ------------------------------ Update user ----------------------------- */
    public function update($data)
    {
        $query = 'UPDATE Users SET username = :username, email=:email, fullName=:fullName, phone=:phone, zip=:zip, city=:city, county=:county, state=:state, about=:about, theme=:theme
                WHERE username = :username;';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':username', $this->nullable($data['username']));
        $stmt->bindValue(':email', $this->nullable($data['email']));
        $stmt->bindValue(':fullName', $this->nullable($data['fullName']));
        $stmt->bindValue(':phone', $this->nullable($data['phone']));
        $stmt->bindValue(':zip', $this->nullable($data['zip']));
        $stmt->bindValue(':city', $this->nullable($data['city']));
        $stmt->bindValue(':county', $this->nullable($data['county']));
        $stmt->bindValue(':state', $this->nullable($data['state']));
        $stmt->bindValue(':about', $this->nullable($data['about']));
        $stmt->bindValue(':theme', $data['theme']);

        $stmt->debugDumpParams();


        if($stmt->execute()){
            return true;
        }   else{
            return false;
        } 
    }
    
    /* ------------------------------- Login User ------------------------------- */
    public function getUserByEmail($email)
    {
        $query = 'SELECT * FROM Users WHERE email = :email';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':email', $email);

        // $stmt->debugDumpParams();

        if ($stmt->execute()){
            $row = $stmt->fetch();
            return $row;
        } else return false;
    }

    /* --------------------------- Find if user exists by email --------------------------- */
    public function emailExists($email)
    {
        // From the database library call the query function to prepare statement
        $query = 'SELECT * FROM Users WHERE email = :email';
        // Bind values
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();


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
        $stmt->execute();

        
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
        $query = 'SELECT id, username, email, created_at, fullName, phone, city, county, zip, contributions, state, about FROM Users';
        $stmt = $this->db->prepare($query);

        $stmt->execute();
        $rows = $stmt->fetchAll();

        return $rows;
    }

    public function nullable($item){
        if($item == ''){
            return NULL;
        } else return $item;
    }
}
