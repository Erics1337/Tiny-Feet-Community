<?php
class Pages extends Controller {
  public function __construct() {
  }

  public function index() {
    // if(isLoggedIn()){
    //   redirect('posts');
    // }

    // redirect('posts');
  
    // // pass data into the view
    $this->view('pages/index');
  }

  // public function about() {
  //   $data = [
  //     'title' => 'About Us',
  //     'description' => 'App to share posts with other users'

  //   ];

  //   $this->view('pages/about', $data);
  // }
}
