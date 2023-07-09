<?php
include("table_retrieve.php");
?>

<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>  <table >
       <tr><th>Item_id</th>

         <th>Item name</th>
         <th>End DAte</th>
         <th>End_time</th>
         <th>base_value</th>
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