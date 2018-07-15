<?php 

class Pages extends Controller{
    public function __construct(){

    }

    public function index(){
      if(isLoggedIn()) {
        redirect('posts');
      }
        $data = ['title'=>'SharePosts','description'=>'Sharing is caring'];
        $this->view('pages/index', $data);
        
    }

    public function about(){
        $data = ['title'=>'About','description'=>'App to share posts with users'];
        $this->view('pages/about', $data);
    }

    public function blue(){
        $data = ['title'=>'Blue'];
        $this->view('pages/blue', $data); 
    }
}