<?php
class Pages extends Controller {
  public function __construct() {
  }

  public function index() {
    // if(isLoggedIn()){
    //   redirect('posts');
    // }
    redirect('posts');

    // $data = [
    //   'title' => 'Tiny Feet Community',
    //   'description' => 'Community Forums to share information about Climate Action Planning'
    // ];

    // // pass data into the view
    // $this->view('pages/index', $data);
  }

  public function about() {
    $data = [
      'title' => 'About Us',
      'description' => 'App to share posts with other users'

    ];

    $this->view('pages/about', $data);
  }
}
