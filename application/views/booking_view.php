<html>

<head>
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="main">
<div id="login">
<h2>Login Form</h2>
<hr/>
<?php echo form_open('user_authentication/booking'); ?>
<label>Depart Date :</label>
<select name="departdate" >
  <option value="1">今天</option>
  <option value="2">明天</option>
  <option value="3">後天</option>
  <option value="4">大後天</option>
  <option value="5">大大後天</option>
</select>
<br>
<br>
<label>Arrive Date :</label>
<select name="arrivedate" >
<option value="1">今天</option>
  <option value="2">明天</option>
  <option value="3">後天</option>
  <option value="4">大後天</option>
  <option value="5">大大後天</option>
</select>
<br>
<br>
<label>Depart From :</label>
<select name="departfrom" >
<option value="Taipei">台北</option>
  <option value="Sydney">雪梨</option>
  <option value="Tokyo">東京</option>
  <option value="Shanghai">上海</option>
  
</select>
<br>
<br>
<label>Arrive To :</label>
<select name="arriveto">
<option value="Taipei">台北</option>
  <option value="Sydney">雪梨</option>
  <option value="Tokyo">東京</option>
  <option value="Shanghai">上海</option>
</select>
<br>
<br>
<input type="submit" value=" Submit " name="submit"/><br />
<a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">To SignUp Click Here</a>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>
