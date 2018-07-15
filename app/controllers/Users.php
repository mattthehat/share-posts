<?php

class Users extends Controller {

    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function login()
    {
          // Check for post submit
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process the form

          // Sanitzie POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $data = [
          'email'=>trim($_POST['email']),
          'password'=>trim($_POST['password'])
          ];

          // Validate email
          if(empty($data['email'])){
              $data['email_error'] = 'Please enter your email';
          }
          // Validate password
          if(empty($data['password'])){
              $data['password_error'] = 'Please enter your password';
          }

          // Check for user email
          if($this->userModel->findUserByEmail($data['email'])) {
            // User found
          } else {
            $data['email_error'] = 'No user found';
          }

          // Make sure errors are empty 
          if(empty($data['email_error']) && empty($data['password_error'])){
            // Check and set logged in user
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if($loggedInUser) {
              // Create the session variables
              $this->createUserSession($loggedInUser);
            } else {  
              $data['password_error'] = 'Password incorrect';
              $this->view('users/login', $data);
            }
          } else {
            $this->view('users/login', $data);
          }
        } else {
        //Init data
        $data = [
        'email'=>'',
        'password'=>'',
        'email_error'=>'',
        'password_error'=>'',
        ];
        // Load view
        $this->view('users/login', $data);
        }
    }

    public function register(){
        // Check for post submit
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process the form

        // Sanitzie POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = ['name'=> trim($_POST['name']),
        'email'=>trim($_POST['email']),
        'password'=>trim($_POST['password']),
        'confirm_password'=> trim($_POST['confirm_password']),
        'name_error'=>'',
        'email_error'=>'',
        'password_error'=>'',
        'confirm_password_error'=>''
        ];

        // Validate name
        if(empty($data['name'])){
            $data['name_error'] = 'Please enter your name';
        }
        // Validate email
        if(empty($data['email'])){
            $data['email_error'] = 'Please enter your email';
        } else {
          // Check email already exists
          if($this->userModel->findUserByEmail($data['email'])) {
            $data['email_error'] = 'Email is already taken';
          }
        }
        // Validate password
        if(empty($data['password'])){
            $data['password_error'] = 'Please enter a password';
        } else if (strlen($data['password']) < 6) {
            $data['password_error'] = 'Password must be at least 6 characters';
        }
        // Validate Confirm Password
        if(empty($data['confirm_password'])){
            $data['confirm_password_error'] = 'Please confirm password';
        } else {
            if($data['password'] !== $data['confirm_password']){
            $data['confirm_password_error'] = 'Passwords do not match';  
            }
        }

        // Make sure errors are empty 

        if(empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])){
        // Validated

        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register user
        if($this->userModel->registerUser($data)) {
          flash('register_success', 'You are registered and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
        

        } else {
        // Load view with errors    
        $this->view('users/register', $data);
        }

        } else {
        //Init data
        $data = ['name'=>'',
        'email'=>'',
        'password'=>'',
        'confirm_password'=> '',
        'name_error'=>'',
        'email_error'=>'',
        'password_error'=>'',
        'confirm_password_error'=>''
        ];
        // Load view
        $this->view('users/register', $data);
        }
    }

    public function createUserSession($user)
    {
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_name'] = $user->name;
      $_SESSION['user_email'] = $user->email;
      redirect('pages/index');
    }

    public function logout()
    {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_email']);
      session_destroy();
      redirect('posts');
    }

    
}