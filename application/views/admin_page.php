<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>
<head>
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="profile">
<?php
echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "Welcome to Admin Page";
echo "<br/>";
echo "<br/>";
echo "Your Username is " . $username;
echo "<br/>";
echo "Your Email is " . $email;
echo "<br/>";
?>
<b id="logout"><a href="logout">Logout</a></b>
<a href="<?php echo base_url() ?>index.php/user_authentication/display_time">To Show Timetable Click Here</a>
<br>
<br>

<a href="<?php echo base_url() ?>index.php/user_authentication/orders_show">To Book a Ticket Click Here</a>
<br>
<br>

<a href="<?php echo base_url() ?>index.php/user_authentication/check_orders">To Review your orders Click Here</a>
</div>
<br/>
</body>
</html>