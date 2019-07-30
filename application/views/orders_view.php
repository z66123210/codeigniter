<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
$userID = ($this->session->userdata['logged_in']['userid']);
} else {
header("location: login");
}
?>


<html>  
 <head>  
   <title>Your Booking History</title>  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
   
 </head>  
 <body>  
 <div class="container border border-dark">  

 
  <nav class="navbar navbar-expand-lg navbar-light bg-dark" style="background-color:gray; margin-top: 30px; padding:20px;">
  <span style="font-size: 30px;font-weight: bold;vertical-align: middle;">Airplane Ticket Booking System<span>
    
    <a class="navear-brand btn btn-warning pull-right" role="button" href="logout">Logout</a>
  </nav>

      <br /><br /><br />  
      
     
       
      <h3>Your Booking History</h3><br />  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th>OrderID</th>  
                     <th>Airline</th>  
                     <th>Depart Time</th>  
                     <th>Arrive Time</th>  
                     <th>Dpart From</th>  
                     <th>Arrive To</th>  
                     <th>Cancel booking</th>  
                </tr>  
           <?php  
           if($fetch_data->num_rows() > 0)  
           {  
                foreach($fetch_data->result() as $row)  
                {  
           ?>  
                <tr>  
                     <td><?php echo $row->orderID; ?></td>  
                     <td><?php echo $row->airline; ?></td>  
                     <td><?php echo $row->depDate; ?></td>  
                     <td><?php echo $row->arriveDate; ?></td>  
                     <td><?php echo $row->departFrom; ?></td>  
                     <td><?php echo $row->arriveTo; ?></td> 
                     <td><button id="button1" type="button" class="btn btn-danger" onclick="book_flight(<?php echo $row->orderID;?>);">Cancel</button></td>
                </tr>  
           <?php       
                }  
           }  
           else  
           {  
           ?>  
                <tr>  
                     <td colspan="8"><h3>No Orders Found</h3></td>  
                </tr>  
           <?php  
           }  
           ?>  
           </table>  
      </div>  

      <div class="container padding-top:30px" id ="ajaxcontainer">  

          </div>
          <div class="container text-center" id ="ajaxcontainer2">  
          <a href='<?php echo base_url() ?>index.php/user_authentication/user_login_process' class='btn btn-warning'>Go Back</a>

          </div>
      
 </div>  
 </body>  
 </html>  
 <script type="text/javascript">
 function book_flight(order){
     $.ajax({
            url: "<?=site_url("user_authentication/delete_order")?>",
            type: "post", // To protect sensitive data
            data: {
               ajax:true,
               variableX: order
              
               //and any other variables you want to pass via POST
                   },
            success:function(){

              // var obj = jQuery.parseJSON(data);
               
               $("#ajaxcontainer").html("<h1>The selected Order has been deleted!</h1>");

               
               
            }
        });

 };
 
   
</script>