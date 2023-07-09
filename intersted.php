<html>
    <head></head>
    <body>
    <?php
 include("auction_data_database.php");
 
 $db= $conn;
 $tableName="current_data";
 $columns= ['ItemId', 'ItemName', 'BaseValue', 'Status', 'EndDate', 'EndTime', 'Description', 'Image'];
 $fetchData = fetch_data($db, $tableName, $columns);
 
 function fetch_data($db, $tableName, $columns){
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
   $query = "SELECT  * FROM  current_data ORDER BY ItemId DESC  LIMIT 05";
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
 
 if(is_array($fetchData)){      
    foreach($fetchData as $data){
        if($_GET['id'] == $data['ItemId'])
        {
           echo "<b><i>Item Id : </b></i> ";
            echo $data['ItemId']??'';
            echo "<br>";
            echo "<br>";

            echo "<b><i>Item Name : </b></i> ";
            echo $data['ItemName']??'';
            echo "<br>";
            echo "<br>";

            echo "<b><i>Item Info : </b></i> ";
            echo $data['Description']??'';
            echo "<br>";
            echo "<br>";


            echo "<b><i>Image : </b></i> ";
            echo $data['Image']??'';
            echo "<br>";
            echo "<br>";

            echo "<b><i>Current Value : </b></i> ";
            echo $data['BaseValue']??'';
            echo "<br>";
            echo "<br>";

            if (isset($_REQUEST['value']) ) 
            {
                if($_REQUEST['value']>=$data['BaseValue'])
                {
                    $val=$_REQUEST['value'];
                    
                    $query = "UPDATE `current_data` SET `BaseValue`='$val',`Status`='1' WHERE ItemID=".$data['ItemId']; 
                    $res   = mysqli_query($conn, $query);  
                   ?>
            <script>
           alert("Data Updated succesfully");
           window.location.href = "dashboard.php";
           </script>
           <?php
         
                }
                else
                {
                    ?>
            <script>
           alert("you entered smaller value than base  value");
           window.location.href = "dashboard.php";
           </script>
           <?php
         

                }
            }else{
    
            ?>
             <br>
             <br><br>
            <form name="value" action="" method="POST">
            <h2>Item New Value</h2>
        <input type="text"  name="value" placeholder="New Value" required />
        <input type="submit" value="submit">
        </form>
        <?php
            }
        }
    }}
  ?>
        </body>
        </html> 