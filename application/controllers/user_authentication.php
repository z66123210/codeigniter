<?php

//session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model("timetable_database");  
$this->load->model('login_database');
$this->load->model('orders_database');
$this->load->helper('url');

}

// Show login page
public function index() {
$this->load->view('login_form');
}

// Show registration page
public function user_registration_show() {
$this->load->view('registration_form');
}

// Validate and store registration data in database
public function new_user_registration() {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');
if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {
$data = array(
'user_name' => $this->input->post('username'),
'user_email' => $this->input->post('email_value'),
'user_password' => $this->input->post('password')
);
$result = $this->login_database->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
$this->load->view('login_form', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}
}
}

// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'trim|required');
$this->form_validation->set_rules('password', 'Password', 'trim|required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
$this->load->view('admin_page');
}else{
$this->load->view('login_form');
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->login_database->read_user_information($username);
if ($result != false) {
$session_data = array(
'username' => $result[0]->user_name,
'email' => $result[0]->user_email,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$this->load->view('admin_page');
}
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login_form', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('login_form', $data);
}

public function display_time()
{   

 
    
    $data["fetch_data"] = $this->timetable_database->fetch_data();  
    
    $this->load->view("timetable_view", $data);  

}
public function orders_show()
{
    $this->load->view('booking_view');


}

public function booking()
{
    
    
    /*$Departdate = $this->input->post('departdate');
    $Arrivedate = $this->input->post('arrivedate');
    $Departfrom = $this->input->post('departfrom');
    $Arriveto = $this->input->post('arriveto');*/

    $data = array(
        'Departdate' => $this->input->post('departdate'),
        'Arrivedate' => $this->input->post('arrivedate'),
        'Departfrom' => $this->input->post('departfrom'),
        'Arriveto' => $this->input->post('arriveto')
        );

   


    
   $result =$this->orders_database->fetch_flight($data);
  

    $data["fetch_data"] = $result;
    
   /* $data = array(
                    'Departdate' => $this->input->post('departdate'),
                    'Arrivedate' => $this->input->post('arrivedate')
                 ); */
      

     

        $this->load->view("booking_confirm", $data); 
}


public function makebooking(){

    echo "<h1>訂票成功 恭喜你優 ^.^!</h1>";
}

}

?>