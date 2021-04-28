<?php
    class Post {
        // If we want to use the database, must instantiate
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

/* ---------------------------- function getPosts() --------------------------- */
        public function getPosts(){
            // Must do a join to access user data within the Post view.
            // posts table has a foreign key user_id which relates to the user_id field in the users table.
            // We can use an inner join on this attribute and reassign same name fields which would otherwise create two duplicates in our newly combined table join with an alias 
            $this->db->query('SELECT *,
                            posts.id as postId,
                            users.id as userId,
                            posts.created_at as postCreated,
                            users.created_at as userCreated
                            FROM posts
                            INNER JOIN users
                            ON posts.user_id = users.id
                            ORDER BY posts.created_at DESC
                            ');

            $results = $this->db->resultSet();  // resultSet() we defined to return more than one row; returns an array

            return $results;
        }


/* ---------------------------- function addPost($data) ---------------------------- */
        public function addPost($data){
            $this->db->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);

            // Execute prepared statement with execute method from Database library
            if($this->db->execute()){   // If executed successfully, return from function true; false if not
                return true;
            } else {
                return false;
            }
        }


/* --------------------------- function updatePost($data) -------------------------- */
        public function updatePost($data){
            $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':body', $data['body']);

            // Execute prepared statement with execute method from Database library
            if($this->db->execute()){   // If executed successfully, return from function true; false if not
                return true;
            } else {
                return false;
            }
        }

/* ------------------------ function getPostById($id) ----------------------- */
        public function getPostById($id){
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();

            return $row;
        }


/* ----------------------------- deletePost($id) ---------------------------- */
        public function deletePost($id){
            $this->db->query('DELETE FROM posts WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);

            // Execute prepared statement with execute method from Database library
            if($this->db->execute()){   // If executed successfully, return from function true; false if not
                return true;
            } else {
                return false;
            }
        
        }
    }