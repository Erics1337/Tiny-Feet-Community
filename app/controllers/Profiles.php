<?php
class Profiles extends Controller
{
    public function __construct()
    {
        // Load User model
        $this->userModel = $this->model('User');

    }

    /* ----------------------------- /profiles/ ----------------------------- */
    public function index()
    {
        // Get all users
        $users = $this->userModel->getAllUsersPublicInfo();

        $data = [
            'users' => $users
        ];
        // Load a view and pass through data array
        $this->view('profiles/index', $data);
    }

    /* ------------------------------ /profiles/user/$username ------------------------------ */
    public function user($username)
    {
        // Get specific user
        $user = $this->userModel->getUserByName($username);

        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'fullName' => $user['fullName'],
            'phone' => $user['phone'],
            'zip' => $user['zip'],
            'city' => $user['city'],
            'county' => $user['county'],
            'state' => $user['state'],
            'about' => $user['about'],
            'theme' => $user['theme'],
            'username_err' => '',
            'email_err' => ''
        ];

        // Load a view and pass through data array
        $this->view('profiles/profile', $data);
    }

    /* ------------------------------ /profiles/edit/$username ------------------------------ */

    public function edit($username)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // Get POST data and sanitize
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'fullName' => trim($_POST['fullName']),
                'phone' => trim($_POST['phone']),
                'zip' => trim($_POST['zip']),
                'city' => trim($_POST['city']),
                'county' => trim($_POST['county']),
                'state' => trim($_POST['state']),
                'about' => trim($_POST['about']),
                'theme' => $_POST['theme'],
                'username_err' => '',
                'email_err' => ''
            ];

            // print_r($data);

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check if email already exists with this model function
                if ($data['email'] != $_SESSION['user_email']) {
                    if($this->userModel->emailExists($data['email'])){
                        $data['email_err'] = 'An account with that username already exists';
                    }
                }
            }
            // Validate username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            } else {
                // Check if email already exists with this model function
                if ($data['username'] != $_SESSION['user_username']){
                    if ($this->userModel->usernameExists($data['username'])) {
                        $data['username_err'] = 'That username is already taken';
                    }
                }
            }

            // Check for errors
            if (empty($data['username_err']) && empty($data['email_err'])) {
                // Validated: passed all tests
                // Register user


                if ($this->userModel->update($data, $_SESSION['user_username'])) {
                    // Flash message
                    flash('register_success', 'Account details have been updated');

                    $this->updateUserSession($data);

                    // Redirect to potential new username

                    redirect('profiles/user/'.$data['username']);

                    // die('Great Success!');

                } else {
                    exit('Something went wrong');
                }
            } else {

                // print_r($data);

                // Load view with errors
                $this->view('profiles/profileEdit', $data);
            }
        } else {
            // Get existing post from model
            $user = $this->userModel->getUserByName($username);
            // Check if same owner is logged in
            if ($user['username'] != $_SESSION['user_username']) {
                redirect('profiles');
            }



            $data = [
                'username' => $user['username'],
                'email' => $user['email'],
                'fullName' => $user['fullName'],
                'phone' => $user['phone'],
                'zip' => $user['zip'],
                'city' => $user['city'],
                'county' => $user['county'],
                'state' => $user['state'],
                'about' => $user['about'],
                'theme' => $user['theme'],
                'username_err' => '',
                'email_err' => ''
            ];


            // Load a view and pass through data array
            $this->view('profiles/profileEdit', $data);
        }
    }

/* -------------------------------- Functions ------------------------------- */
    public function updateUserSession($data){


        // Reset timer on user_id
        $_SESSION['user_id'] = $_SESSION['user_id'];
        // Reset to new variables
        $_SESSION['user_email'] = $data['email'];
        $_SESSION['user_username'] = $data['username'];
        $_SESSION['user_theme'] = $data['theme'];
    }
}
