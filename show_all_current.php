<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<?php
 include("auction_data_database.php");
 
 $db= $conn;
 $tableName="current_data";
 $columns= ['ItemId', 'ItemName', 'BaseValue', 'Status', 'EndDate', 'EndTime', 'Description', 'Image'];
 $fetchData = gets($db, $tableName, $columns);

 function gets($db, $tableName, $columns){
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
   
 
 $query = "SELECT  * FROM current_data ORDER BY ItemId DESC;";
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

<table >
       <tr><th>Item_id</th>

         <th>Item name</th>
         <th>End DAte</th>
         <th>End_time</th>
         <th>base_value</th>
         <th>Image</th>
         <th>item_info</th>
</tr>
    
  <?php
      if(is_array($fetchData)){      
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $data['ItemId']??''; ?></td>
      <td><?php echo $data['ItemName']??''; ?></td>
      <td><?php echo $data['EndDate']??''; ?></td>
      <td><?php echo $data['EndTime']??''; ?></td>
      
      <td><?php echo $data['BaseValue']??''; ?></td>
      <td><?php echo $data['Description']??''; ?></td>  
      <?php $folder="uploads/".$data['Image']; ?>
      <td><?php echo "<img src='$folder' height='50px'>"; ?></td>
      <td><?php echo '<a id="grey" href="intersted.php?id='.$data['ItemId'].'">'.'Interested'.'</a>'; ?> </td>
     </tr>
     <?php
     }}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
      </tr>
    <?php
    }?>
    
     </table>
</body>
</html>
