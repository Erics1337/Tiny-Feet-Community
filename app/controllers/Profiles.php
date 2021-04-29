<?php
 class Profiles extends Controller{
    public function __construct(){
        // Load User model
        $this->userModel = $this->model('User');
    }

/* ----------------------------- /profiles/ ----------------------------- */
        public function index(){

            // Get all users
            $users = $this->userModel->getAllUsersPublicInfo();

            $data = [
                'users' => $users
            ];
            // Load a view and pass through data array
            $this->view('profiles/index', $data);
        
        }

/* ------------------------------ /profiles/user/$username ------------------------------ */
    public function user($username){
        // Get specific user
        $user = $this->userModel->getUserByName($username);

        $data = [
            'user' => $user
        ];
        // Load a view and pass through data array
        $this->view('profiles/profile', $data);

    }

/* ------------------------------ /profiles/user/$username ------------------------------ */
    public function edit($username){
        // Get specific user
        $user = $this->userModel->getUserByName($username);

        $data = [
            'user' => $user
        ];
        // Load a view and pass through data array
        $this->view('profiles/profile', $data);

    }
        
        
    }