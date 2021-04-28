<?php
    session_start();

    // Flash message helper
    // Essentially this function just 
    // stores the $_SESSION[$name] as the key and $_SESSION[$name] == $message as the value
    // also set the class inside a session variable
    // to be displayed to the view (in session variables) in a div with the class and the message and unsetting it
    function flash($name = '', $message = '', $class = 'alert alert-success'){
        if(!empty($name)){
            // If message is passed in and not already set inside of a session
            if(!empty($message) && empty($_SESSION[$name])){
                // If session exists then make sure its unset
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }
                // Reset session
                if(!empty($_SESSION[$name. '_class'])){
                    unset($_SESSION[$name. '_class']);
                }

                // Set session class
                $_SESSION[$name] = $message;
                $_SESSION[$name. '_class'] = $class;
            } 
            // If message is passed in and it IS set in session
            elseif(empty($message) && !empty($_SESSION[$name])){
                // Check if session class is empty and if not then put it inside class variable, else nothing
                $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
                // Display message
                echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
                // We dont want the session messages to be stored
                unset($_SESSION[$name]);
                unset($_SESSION[$name. '_class']);
            }
        }
    }


    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else return false;
    }
