<?php
 include("auction_data_database.php");
 
 $db= $conn;
 $tableName="upcoming_data";
 $columns= ['ItemId','ItemName','BaseValue','StartTime','EndTime','StartDate','EndDate', 'Description','Image'];
 $fetch = fun($db, $tableName, $columns);
 
 function fun($db, $tableName, $columns){
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
   
 
 $query = "SELECT  * FROM upcoming_data ;";
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
        
        if($today_date>= $data['StartDate'] && $today_time>=$data['StartTime'])
        {
            $itemid=$data['ItemId'];
            $itemname=$data['ItemName'];
            $basevalue=$data['BaseValue'];
            $enddate=$data['EndDate'];
            $endtime=$data['EndTime'];
            $desc=$data['Description'];
            $img=$data['Image'];
            $query="INSERT INTO `current_data`(`ItemId`, `ItemName`, `BaseValue`, `EndDate`, `EndTime`, `Description`, `Image`) VALUES ('$itemid','$itemname','$basevalue','$enddate','$endtime','$desc','$img')";
            $res   = mysqli_query($conn, $query);  
           
            $q="DELETE FROM `upcoming_data` WHERE ItemId=".$itemid;
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