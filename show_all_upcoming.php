<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<?php
 include("auction_data_database.php");
 
 $db= $conn;
 $tableName="upcoming_data";
 $columns= ['ItemName','BaseValue','StartTime','EndTime','Date', 'Description','Image'];
 $fetch = func($db, $tableName, $columns);

 function func($db, $tableName, $columns){
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
   
 
 $query = "SELECT  * FROM upcoming_data ORDER BY ItemId DESC;";
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

   <table>


   <th>Item_name</th>
         <th>base_value</th>
         <th>Start_time</th>
         <th>End_time</th>
         <th>Start Date</th>
         <th>End Date</th>
         
         <th>item_info</th>
         <th>PHOTO</th>
</tr>
    
  <?php
      if(is_array($fetch)){      
     
      foreach($fetch as $data){
    ?>
      <tr>
      
      <td><?php echo $data['ItemName']??''; ?></td>
      <td><?php echo $data['BaseValue']??''; ?></td>
      <td><?php echo $data['StartTime']??''; ?></td>
      <td><?php echo $data['EndTime']??''; ?></td>
      <td><?php echo $data['StartDate']??''; ?></td>
      <td><?php echo $data['EndDate']??''; ?></td>
      <td><?php echo $data['Description']??''; ?></td>
       
      <?php $folder="uploads/".$data['Image']; ?>
      <td><?php echo "<img src='$folder' height='50px'>"; ?></td>
    
     </tr>
     <?php
      }}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetch; ?>
  </td>
      </tr>
    <?php
    }?>
    
     </table>
   

</body>
</html>
