<?php
include("table_retrieve_result.php");
?>

<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>  <table >
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
