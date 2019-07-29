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
   <title>Insert Update Delete Data using Codeigniter</title>  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
   
 </head>  
 <body>  
 <div class="container">  
      <br /><br /><br />  
      
     
       
      <h3>Fetch Data from Table using Codeigniter</h3><br />  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th>ID</th>  
                     <th>Airline</th>  
                     <th>Depart Time</th>  
                     <th>Arrive Time</th>  
                     <th>Dpart From</th>  
                     <th>Arrive To</th>  
                     <th>Make booking</th>  
                </tr>  
           <?php  
           if($fetch_data->num_rows() > 0)  
           {  
                foreach($fetch_data->result() as $row)  
                {  
           ?>  
                <tr>  
                     <td><?php echo $row->planeID; ?></td>  
                     <td><?php echo $row->airline; ?></td>  
                     <td><?php echo $row->depDate; ?></td>  
                     <td><?php echo $row->arriveDate; ?></td>  
                     <td><?php echo $row->departFrom; ?></td>  
                     <td><?php echo $row->arriveTo; ?></td> 
                     <td><button id="button1" type="button" class="btn btn-primary" onclick="book_flight(<?php echo $userID;?>,<?php echo $row->planeID;?>,'<?php echo $row->arriveTo;?>',<?php echo $row->arriveDate;?>);">BOOK</button></td>
                </tr>  
           <?php       
                }  
           }  
           else  
           {  
           ?>  
                <tr>  
                     <td colspan="5">No Data Found</td>  
                </tr>  
           <?php  
           }  
           ?>  
           </table>  
      </div>  

      <div class="container" id ="ajaxcontainer">  

          </div>
          <div class="container" id ="ajaxcontainer2">  

          </div>
      
 </div>  
 </body>  
 </html>  
 <script type="text/javascript">
 function book_flight(userID, planID, destination, arrive){
     $.ajax({
            url: "<?=site_url("user_authentication/makebooking")?>",
            type: "post", // To protect sensitive data
            data: {
               ajax:true,
               variableX: userID,
               variableY: planID,
               variableZ: destination,
               variableA: arrive
               //and any other variables you want to pass via POST
                   },
            success:function(data){

               var obj = jQuery.parseJSON(data);
               
               $("#ajaxcontainer").html("<h1>Your Order has been made successfully!</h1> <br><br><h1>The Weather of Your destnation is: <span style =color:red;>" + obj[0] + "</span> Please dress accordingly!</h1>");

               $("#ajaxcontainer2").html("<a href='<?php echo base_url() ?>index.php/user_authentication/user_login_process' class='btn btn-default'>Go Back</a>");
               
            }
        });

 };
 
   
</script>