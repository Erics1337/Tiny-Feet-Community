<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /* ------------------------------ Register user ----------------------------- */
    public function register($data)
    {
        $this->db->query('INSERT INTO Users (username, email, password) VALUES(:username, :email, :password)');
        // Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // Execute prepared statement with execute method from Database library
        if ($this->db->execute()) {   // If executed successfully, return from function true; false if not
            return true;
        } else {
            return false;
        }
    }

    /* ------------------------------- Login User ------------------------------- */
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM Users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

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
        $this->db->query('SELECT * FROM Users WHERE email = :email');
        // Bind values
        $this->db->bind(':email', $email);


        // Check row if email found
        if ($this->db->rowCount() > 0) {
            return true;
        } else return false;
    }


    /* --------------------------- Find if user exists by email --------------------------- */
    public function usernameExists($username)
    {
        // From the database library call the query function to prepare statement
        $this->db->query('SELECT * FROM Users WHERE username = :username');
        // Bind values
        $this->db->bind(':username', $username);

        
        if ($this->db->rowCount() > 0) {
            return true;
        } else return false;

    }

    /* ------------------------------- Get user by id ------------------------------ */
    public function getUserById($id)
    {
        // From the database library call the query function to prepare statement
        $this->db->query('SELECT * FROM Users WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    /* ------------------------------- Get user by name ------------------------------ */
    public function getUserByName($username)
    {
        // From the database library call the query function to prepare statement
        $this->db->query('SELECT * FROM Users WHERE username = :username');
        // Bind values
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        return $row;
    }

    /* ------------------------------- Get all user names ------------------------------ */
    public function getAllUsersPublicInfo()
    {
        // From the database library call the query function to prepare statement
        $this->db->query('SELECT username, email, created_at FROM Users');

        $rows = $this->db->resultSet();

        return $rows;
    }
}
