<?php
    class Post {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;
        private $db;
        private $error;

        public function __construct() {
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

/* ---------------------------- function getPosts() --------------------------- */
        public function getPosts(){
            // Must do a join to access user data within the Post view.
            // posts table has a foreign key user_id which relates to the user_id field in the users table.
            // We can use an inner join on this attribute and reassign same name fields which would otherwise create two duplicates in our newly combined table join with an alias 
            $query = 'SELECT *,
                            Posts.id as postId,
                            Users.id as userId,
                            Posts.created_at as postCreated,
                            Users.created_at as userCreated
                            FROM Posts
                            INNER JOIN Users
                            ON Posts.user_id = Users.id
                            ORDER BY Posts.created_at DESC
                            ';

            $stmt = $this->db->prepare($query);
            $stmt->execute();

            if ($stmt->execute()){
                $results = $stmt->fetchAll();
                return $results;
            } else return false;
        }

/* ---------------------------- function getPostsByTopic() --------------------------- */
        public function getPostsByTopic($topic){
            $query = 'SELECT *,
                            Posts.id as postId,
                            Users.id as userId,
                            Posts.created_at as postCreated,
                            Users.created_at as userCreated
                            FROM Posts
                            INNER JOIN Users
                            ON Posts.user_id = Users.id
                            WHERE Posts.topic = :topic 
                            ORDER BY Posts.created_at DESC
                            ';

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':topic', $topic);
            $stmt->execute();

            if ($stmt->execute()){
                $results = $stmt->fetchAll();
                return $results;
            } else return false;
        }


/* --------------------------- Find if user exists by email --------------------------- */
        public function topicExists($topic)
        {
            // From the database library call the query function to prepare statement
            $query = 'SELECT * FROM Posts WHERE topic = :topic';
            // Bind values
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':topic', $topic);
            $stmt->execute();


            // Check row if email found
            if ($stmt->rowCount() > 0) {
                return true;
            } else return false;
        }
/* ---------------------------- function addPost($data) ---------------------------- */
        public function addPost($data){
            $query = 'INSERT INTO Posts (topic, title, user_id, body) VALUES(:topic, :title, :user_id, :body);
                        UPDATE Users SET contributions = contributions + 1 WHERE id = :user_id;';
            $stmt = $this->db->prepare($query);
            // Bind values
            $stmt->bindValue(':topic', $data['topic']);
            $stmt->bindValue(':title', $data['title']);
            $stmt->bindValue(':user_id', $data['user_id']);
            $stmt->bindValue(':body', $data['body']);

            // Execute prepared statement with execute method from Database library
            if($stmt->execute()){   // If executed successfully, return from function true; false if not
                return true;
            } else {
                return false;
            }
        }


/* --------------------------- function updatePost($data) -------------------------- */
        public function updatePost($data){
            $query = 'UPDATE Posts SET title = :title, body = :body WHERE id = :id';
            $stmt = $this->db->prepare($query);

            // Bind values
            $stmt->bindValue(':title', $data['title']);
            $stmt->bindValue(':id', $data['id']);
            $stmt->bindValue(':body', $data['body']);

            // Execute prepared statement with execute method from Database library
            if($stmt->execute()){   // If executed successfully, return from function true; false if not
                return true;
            } else {
                return false;
            }
        }

/* ------------------------ function getPostById($id) ----------------------- */
        public function getPostById($id){
            $query = 'SELECT * FROM Posts WHERE id = :id';
            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':id', $id);
            if ($stmt->execute()){
                $row = $stmt->fetch();
                return $row;
            } else return false;
        }


/* ----------------------------- deletePost($id) ---------------------------- */
        public function deletePost($id){
            $query = 'DELETE FROM Posts WHERE id = :id';
            // Bind values
            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':id', $id);

            // Execute prepared statement with execute method from Database library
            if($stmt->execute()){   // If executed successfully, return from function true; false if not
                return true;
            } else {
                return false;
            }
        
        }
    }