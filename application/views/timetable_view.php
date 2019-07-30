<html>  
 <head>  
   <title>Airline Time Table</title>  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
 </head>  
 <body>  
 <div class="container">  
 <nav class="navbar navbar-expand-lg navbar-light bg-dark" style="background-color:gray; margin-top: 30px; padding:20px;">
  <span style="font-size: 30px;font-weight: bold;vertical-align: middle;">Airplane Ticket Booking System<span>
    
    <a class="navear-brand btn btn-warning pull-right" role="button" href="logout">Logout</a>
  </nav>
      
     
       
      <h3 style="text-align: center ;padding:15px; font-weight: bold;">Airline Time Table</h3><br />  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th>ID</th>  
                     <th>Airline</th>  
                     <th>Depart Time</th>  
                     <th>Arrive Time</th>  
                     <th>Dpart From</th>  
                     <th>Arrive To</th>  
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
      
      <div class="container text-center ; " >  
          <a href='<?php echo base_url() ?>index.php/user_authentication/user_login_process' class='btn btn-warning'>Go Back</a>

          </div>
 </div>  
 </body>  
 </html>  