<?php
    class Users extends Controller{
        public function __construct(){
            // Load User model
            $this->userModel = $this->model('User');
        }

/* ----------------------------- /users/register ---------------------------- */
        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data =[
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'username_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check if email already exists with this model function
                    if($this->userModel->emailExists($data['email'])){
                        $data['email_err'] = 'An account with that username already exists';
                    }
                }
                // Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter username';
                } else {
                    // Check if email already exists with this model function
                    if($this->userModel->usernameExists($data['username'])){
                        $data['username_err'] = 'That username is already taken';
                    }
                }
                // Validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }   elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }
                // Validate confirm password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Password do not match';
                    }
                }
                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['username_err']) && empty($data['password_err']) && 
                empty($data['confirm_password_err'])){
                    // Validated
                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    
                    // Register user
                    if($this->userModel->register($data)){
                        // Flash message
                        flash('register_success', 'You are registered and can log in');
                        redirect('users/login');    //redirect is a helper function in app/helpers/url_helper.php
                    } else {
                        exit('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/register', $data);
                }
            } else {
                // Init data
                $data =[
                    'username' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'username_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('users/register', $data);
            }
        }


/* ------------------------------ /users/login ------------------------------ */
        // Handles loading and submitting register form
        public function login(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
                // Sanitize POST data
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data =[
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }
                // Validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }

                // Check for user/email
                if($this->userModel->emailExists($data['email'])){
                    // User found
                } else {
                    $data['email_err'] = 'No user found';
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated
                    // Check and set logged in user

                    $user = $this->userModel->getUserByEmail($data['email']);

                    // If successfully loged in user object then create session
                    if(password_verify($data['password'], $user['password'])){
                        // Create Session variables and add data that was pulled from the database to that Session, else load login view with error
                        $this->createUserSession($user);
                    } else {
                        // Render form with an error
                        $data['password_err'] = 'Password incorrect';

                        $this->view('users/login', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('users/login', $data);
                }
            } else {
                // Init data
                $data =[
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }


/* -------------------------------- functions ------------------------------- */
        public function createUserSession($user){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_username'] = $user['username'];
            // This is where page redirects to after login
            redirect('posts');
        }


        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_username']);
            session_destroy();
            redirect('users/login');
        }
    }