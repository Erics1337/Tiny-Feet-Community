<?php
    class Posts extends Controller {
        public function __construct(){
            // To make all the /posts/ restricted, check for loggedIn here in constructor
            if(!isLoggedIn()){
                redirect('users/login');
            }
            // These class member variables can be used everywhere if declared in the constructor
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }

        public function index(){
            // Get posts
            $posts = $this->postModel->getPosts();

            $data = [
                'posts' => $posts
            ];
            // Load a view and pass through data array
            $this->view('posts/index', $data);
        }

        
/* ------------------------------  add() ------------------------------ */
        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // Get POST data and sanitize
                $data = [                                                        // Add data stuff
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate title                                               // Validate data
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['body_err'])){
                    // Validated: passed all tests
                    if($this->postModel->addPost($data)){
                        flash('post_message', 'Post Added');
                        redirect('posts');
                    } else {
                        exit('Something went wrong');
                    }

                } else {
                    // Load view with errors
                    $this->view('posts/add', $data);
                }

            } else {
                $data = [
                    'posts' => '',
                    'body' => ''
                ];
    
                // Load a view and pass through data array
                $this->view('posts/add', $data);
            }
        }


/* ------------------------------  edit($id) ----------------------------- */
        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // Get POST data and sanitize
                $data = [         
                    'id' => $id,                                               // Add data stuff
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate title                                               // Validate data
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }

                // Check for errors
                if(empty($data['title_err']) && empty($data['body_err'])){
                    // Validated: passed all tests
                    if($this->postModel->updatePost($data)){
                        flash('post_message', 'Post Updated');
                        redirect('posts');
                    } else {
                        exit('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('posts/add', $data);
                }
            } else {
                // Get existing post from model
                $post = $this->postModel->getPostById($id);
                // Check for owner
                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts');
                }

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body
                ];
    
                // Load a view and pass through data array
                $this->view('posts/edit', $data);
            }
        }

/* ------------------------------  show($id) ----------------------------- */
        public function show($id){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/show', $data);
        }


/* ------------------------------- delete($id) ------------------------------ */
        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Get existing post from model
                $post = $this->postModel->getPostById($id);
                // Check for owner
                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts');
                }
                if($this->postModel->deletePost($id)) {
                    flash('post_message', 'Post Removed');
                    redirect('posts');
                } else exit('Something went wrong');
            } else {
                redirect('posts');
            }
        }
    }