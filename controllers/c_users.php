<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
	
    }
    
    public function signup() {
       
        # Set up the view
        $this->template->content = View::instance('v_users_signup');
	$this->template->title = "Sign Up";
	
	# Render the view
	echo $this->template;
	
    }
    
    public function p_signup() {
	
	# Time data stored when the user creates a profile
	$_POST['created'] = Time::now();
	$_POST['modified'] = Time::now();
	
	# Encrypts the password  
	$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	
	# Create an encrypted token via their email address and a random string
	$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 
	
	
	# insert $_POST into users table
	$user_id = DB::instance(DB_NAME)->insert_row('users', $_POST);
	
	# insert a row in users_users table for always following self
	$q = Array (
            "created" => Time::now(),
            "user_id" => $user_id,
            "user_id_followed" => $user_id);

        # insert array into users_users table
        DB::instance(DB_NAME)->insert('users_users', $q);

	
	# Redirects users back to the login page
	Router::redirect('/users/login');
	#header('Location: /users/login');
	
    }
    
    
    public function login() {
        
	# Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";

	# Render template
        echo $this->template;
	
    }
    
    public function p_login() {
	
	# Reads the password  
	$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	
	
	 $q = "SELECT token 
		FROM users 
		WHERE email = '".$_POST['email']."' 
		AND password = '".$_POST['password']."'";
	
	$token = DB::instance(DB_NAME)->select_field($q);
	
	
	
	# Success
	if($token) {
		
		/* 
		Store this token in a cookie using setcookie()
		Important Note: *Nothing* else can echo to the page before setcookie is called
		Not even one single white space.
		param 1 = name of the cookie
		param 2 = the value of the cookie
		param 3 = when to expire
		param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
		*/
		setcookie("token", $token, strtotime('+1 year'), '/');
	
		# Send them to the main page - or whever you want them to go
		Router::redirect("/");
		
	}
	# Fail
	else {
		
		# Send them back to the login page
		Router::redirect("/users/login/");
	
		 # But if we did, login succeeded! 	
	}

    }


    public function logout() {
	
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
	
	$data = Array('token' => $new_token);
	
	 DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

	#deletes cookie by resetting to back by one year.
	setcookie('token', '', strtotime('-1 year'), '/');
	
	#returns user to login page once they have logged out
	Router::redirect("/users/login/");
	
    }

    public function profile($user_name = NULL) {
	
	if(!$this->user){
		
		//Router:redirect('/');
		die('Members only. <a href="/users/login">Login</a>');
	}
	
	# Set up the View
	$this->template->content = View::instance('v_users_profile');
	$this->template->title = "Profile";
	
	$client_files_head = Array(
		'/css/profile.css');
	
	$this->template->client_files_head = Utils::load_client_files($client_files_head);
	
	$client_files_body = Array(
		'/js/profile.js');
	
	
	$this->template->client_files_body = Utils::load_client_files($client_files_body);
	
	# Pass the data to the View
	$this->template->content->user_name = $user_name;
	
	# Display the View
	echo $this->template;
	
	//$view = View::instance('v_users_profile');
	//$view->user_name = $user_name;
	//echo $view;
    }

}

?>