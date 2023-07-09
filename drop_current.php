<?php
 include("auction_data_database.php");
 
 $db= $conn;
 $tableName="current_data";
 $columns= ['ItemId', 'ItemName', 'BaseValue', 'Status', 'EndDate', 'EndTime', 'Description', 'Image'];
 $fetch = foo($db, $tableName, $columns);
 
 function foo($db, $tableName, $columns){
  if(empty($db)){
   $msg= "Database connection error";
  }
  elseif (empty($columns) || !is_array($columns)) {
   $msg="columns Name must be defined in an indexed array";
  }
  elseif(empty($tableName)){
    $msg= "Table Name is empty";
 }
 else{
   $query = "SELECT  * FROM  current_data";
 $result = $db->query($query);
 
 if($result== true){ 
  if ($result->num_rows > 0) {
     $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
     $msg= $row;
  } else {
     $msg= "No Data Found"; 
  }
}else{
   $msg= mysqli_error($db);
 }
 }
 return $msg;
 }
 
 if(is_array($fetch)){      
     
    foreach($fetch as $data){
        date_default_timezone_set("Asia/Kolkata");
        $today_date=date("Y-m-d");
        $today_time=date("H:i:s");
        
        if(($today_date == $data['EndDate'] && $today_time>=$data['EndTime']) || ($today_date >$data['EndDate']))
        {
            
            $itemid=$data['ItemId'];
            $itemname=$data['ItemName'];
            $basevalue=$data['BaseValue'];
            $status=$data['Status'];
            $img=$data['Image'];
            $query="INSERT INTO `result_data`(`ItemId`, `ItemName`, `BaseValue`, `Status`, `Image`) VALUES  ('$itemid','$itemname','$basevalue','$status','$img')";
            $res   = mysqli_query($conn, $query);  
           
            $q="DELETE FROM `current_data` WHERE ItemId=".$itemid;
             $r=mysqli_query($conn,$q);
             if($r)
             {
                ?>
                <script>
                    window.location.reload();
                    </script>
                    <?php
             }
        }
    }}
 ?>