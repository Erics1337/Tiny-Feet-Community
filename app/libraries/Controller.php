<?php
// Base Controller
// Loads the models and views

// Allows us to load models from our controller
class Controller
{
    // Load model
    public function model($model)
    {
        // Require model file
        require_once "../app/models/" . $model . '.php';

        // Instantiate model
        return new $model();
    }

    // Load View - $data[] represents the dynamic values that are passed into the views
    public function view($view, $data = [])
    {
        // Check for view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exist
            die('Page does not exist');
        }
    }
}
