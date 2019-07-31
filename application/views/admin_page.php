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


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="background-color:gray; margin-top: 30px; padding:20px;">
  <span style="font-size: 30px;font-weight: bold;vertical-align: middle;">Airplane Ticket Booking System<span>
    
    <a class="navear-brand btn btn-warning pull-right" role="button" href="logout">Logout</a>
  </nav>
<div class ="container" >
  <div class ="row">
        <div class= "col-md-4">
              <a  href="<?php echo base_url() ?>index.php/user_authentication/display_time" class="btn btn-info" role="button">To Show Timetable Click Here</a>
              <br>
              <br>

              <a href="<?php echo base_url() ?>index.php/user_authentication/orders_show" class="btn btn-info" role="button">To Book a Ticket Click Here</a>
              <br>
              <br>

              <a href="<?php echo base_url() ?>index.php/user_authentication/check_orders" class="btn btn-info" role="button">To Review your orders Click Here</a>
        </div>

        <div class= "col-md-8">
                <?php
                    echo "<h3>Hello " . $username . "</h3>";
                    echo "<br/>";
                    
                    echo "<h3>Welcome to Admin Page</h3>";
                    echo "<br/>";
                   
                    echo "<h3>Your Username is " . $username."</h3>";
                    echo "<br/>";
                    echo "<h3>Your Email is " . $email."</h3>";
                    echo "<br/>";
                ?>
        </div>
  </div>
</div>





</body>
</html>