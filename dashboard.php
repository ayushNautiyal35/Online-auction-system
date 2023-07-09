<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="header">
        <a href="#currentbidding"> current bidding </a>
        <a href="#upcomingbidding"> upcoming bidding </a>
        <a href="#result"> result </a>
        <a href="#uploadbid"> Upload bid </a>
        <a href="logout.php"> Logout </a>
   </div>
   <br><br>
   
<a name="currentbidding"></a>
<h1> Current Auction</h1> 

<div class="current">

<br>

<?php
require("show_content.php");
require("drop_current.php");
?>
<a id="red" href="show_all_current.php">Load More</a>
</div>
<br><br>

<a name="upcomingbidding"></a>

<h1>Upcoming Auction</h1>
<div class="up">

<?php
require("show_upcoming.php");
require("drop_upcoming.php");
?>
<a id="red"  href="show_all_upcoming.php">Load More</a>
</div>
<br><br>

<a name="result"></a>

<h1>Result</h1>

<div class="result">

<?php
require("show_result.php");
?>
<a id="red" href="show_all_result.php">Load More</a>
</div>
<br><br>


<a name="uploadbid"></a>

<h1>Upload Bid</h1>

<div class="uploadbid">

<?php
require("upload_bid.php");
?>
</div>
<br><br>

</body>
</html>