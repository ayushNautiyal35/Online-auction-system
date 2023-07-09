<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>

</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['submit'])) {
        $username = $_REQUEST['username'];    // removes backslashes
      
        $password = $_REQUEST['password'];
        
        
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) ;
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form  method="post" name="login">
        <h1>Login</h1>
        <input type="text"  name="username" placeholder="Username" autofocus="true"/>
        <input type="password"  name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" />
        <br><br><a href="registration.php">New Registration</a>
  </form>
<?php
    }
?>
</body>
</html>