<?php
 include("auction_data_database.php");
 
 $db= $conn;
 $tableName="upcoming_data";
 $columns= ['ItemId','ItemName','BaseValue','StartTime','EndTime','StartDate','EndDate', 'Description','Image'];
 $fetch = fetch($db, $tableName, $columns);
 
 function fetch($db, $tableName, $columns){
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
   
 
 $query = "SELECT  * FROM upcoming_data ORDER BY ItemId DESC LIMIT 10;";
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
 ?>