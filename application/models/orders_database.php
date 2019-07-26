<?php  
 class orders_database extends CI_Model  
 {  
    
    function fetch_flight($data)  
    {  
          $query = $this->db->query("SELECT * FROM timetable WHERE depDate=$data[Departdate] AND arriveDate=$data[Arrivedate] AND departFrom='$data[Departfrom]' AND arriveTo='$data[Arriveto]'  ORDER BY planeID DESC"); 
        if(!$query)
        {
            echo "<h1>Sorry, No Match Result!</h1>";
        }
        else {
            return $query;
        }

    }  
    
    
    function insert_data($data)  
      {  
           $this->db->insert("tbl_user", $data);  
      }  
      function fetch_data()  
      {  
           //$query = $this->db->get("tbl_user");  
           //select * from tbl_user  
           //$query = $this->db->query("SELECT * FROM tbl_user ORDER BY id DESC");  
           $this->db->select("*");  
           $this->db->from("tbl_user");  
           $query = $this->db->get();  
           return $query;  
      }  
      function delete_data($id){  
           $this->db->where("id", $id);  
           $this->db->delete("tbl_user");  
           //DELETE FROM tbl_user WHERE id = $id  
      }  
      function fetch_single_data($id)  
      {  
           $this->db->where("id", $id);  
           $query = $this->db->get("tbl_user");  
           return $query;  
           //Select * FROM tbl_user where id = '$id'  
      }  
      function update_data($data, $id)  
      {  
           $this->db->where("id", $id);  
           $this->db->update("tbl_user", $data);  
           //UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'  
      }  
 }  