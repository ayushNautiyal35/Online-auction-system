<!DOCTYPE html>
<html>
<head>
</head>
<body >
<?php

    require('auction_data_database.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['item_name']) ) 
        
       {
        $statusMsg = 0;


// File upload path
$targetDir = "C:/xampp_install/htdocs/phpfiles/uploads/";
$fileName = basename($_REQUEST["file"]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_REQUEST["file"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){
            
                // Upload file to server
                $files=$_REQUEST["file"];
              
                //if(move_uploaded_file($files, $targetFilePath))
                {
                // Insert image file name into database
               
                $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
                if($insert){
                    $statusMsg = 1;
                }}
               
            
        }
    }
}
        if($statusMsg==1)
        {
        $itemname = $_REQUEST['item_name'];
        $starttime = $_REQUEST['start_time'];
        $endtime = $_REQUEST['end_time'];
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];
        $basevalue = $_REQUEST['base_value'];
        $iteminfo = $_REQUEST['item_info'];
        $picture=$fileName;
       $query    = "INSERT into `upcoming_data`(`ItemName`, `BaseValue`, `StartTime`, `EndTime`, `StartDate`, `EndDate`, `Description`, `Image`)VALUES ( '$itemname','$basevalue','$starttime','$endtime','$startdate','$enddate','$iteminfo','$picture')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            ?>
            <script>
           alert("you entered succesfully");
           window.location.href = "dashboard.php";
           </script>
           <?php
         
        } else {
            ?>
            <script>
                alert("Missing fields");
                window.location.href = "dashboard.php";
                </script>
                <?php 
        
        }
        
    }
    else{
        ?>
   
    <script>
        alert("Error in upload");
        </script>
         <?php
    }
    }
     else {
?>
    <form name="uploaddata" action="" method="post">
        <h2>Item Name</h2>
        <input type="text"  name="item_name" placeholder="Username" required />
        <h2 >Base Value</h2>
        <input type="text"  name="base_value"  required />
        <h2 >Start time</h2>
        <input type="time"  name="start_time" placeholder="Start time" required />
        <h2 >End Time</h2>
        <input type="time"  name="end_time" placeholder="End Time" required />
        <h2 >Start Date</h2>
        <input type="date"  name="startdate"  required />
        <h2 >End Date</h2>
        <input type="date"  name="enddate"  required />
        
        <h2 >Description of Item</h2>
        <textarea  rows="10" cols="30" name="item_info"  required ></textarea>
        
        <br>
        <h2>Photo Upload</h2>
        
      <input type="file" name="file">
   
  <br><br><br><br><br>
        <input  type="submit" value="submit" >
      </form>
<?php
    }
?>
</body>
</html>