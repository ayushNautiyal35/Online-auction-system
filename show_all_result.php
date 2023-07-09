<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<?php
 include("auction_data_database.php");
 
 $db= $conn;
 $tableName="result_data";
 $columns= ['ItemId', 'ItemName', 'BaseValue','Status','Image'];
 $fet= calls($db, $tableName, $columns);

 function calls($db, $tableName, $columns){
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
   
 
 $query = "SELECT  * FROM result_data ORDER BY ItemId DESC;";
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

         <th>Item_name</th>
        
         <th>Value</th>
         <th>Status</th>
         <th>Image</th>
</tr>
    
  <?php
      if(is_array($fet)){      
      foreach($fet as $data){
    ?>
      <tr>
      <td><?php echo $data['ItemId']??''; ?></td>
      <td><?php echo $data['ItemName']??''; ?></td>
      <td><?php echo $data['BaseValue']??''; ?></td>
      <td><?php  if( $data['Status']==0)
      echo "Unsold";
      else
      echo "Sold";
      ?></td>
             <?php $folder="uploads/".$data['Image']; ?>
      <td><?php echo "<img src='$folder' height='50px'>"; ?></td>
     </tr>
     <?php
      }}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fet; ?>
  </td>
      </tr>
    <?php
    }?>
    
     </table>
</body>
</html>
