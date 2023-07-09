<?php
include("table_retrieve_upcoming.php");
?>

<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>

<body> 
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
       
    <?php
     include("auction_data_database.php");
   $query = $db->query("SELECT file_name FROM images ORDER BY uploaded_on DESC");
   if($query->num_rows > 0){
       $row = $query->fetch_assoc();
           $imageURL = 'C:/xampp_install/htdocs/phpfiles/uploads/'.$row["file_name"];
   
   ?>
  
       <img src="<?php= $imageURL; ?>" />

    
     </tr>
     <?php
      }}}else{ ?>
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