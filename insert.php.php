<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    
// When form submitted, check and create user session.
    if (isset($_REQUEST['Enrollnment_no'])) {
        // removes backslashes
        $Enrollnment_no = stripslashes($_REQUEST['Enrollnment_no']);
        //escapes special characters in a string
        $Enrollnment_no = mysqli_real_escape_string($con, $Enrollnment_no);
        $email_id    = stripslashes($_REQUEST['email_id']);
        $email_id    = mysqli_real_escape_string($con, $email_id);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query    = "INSERT into `payment` (Enrollnment_no, email_id,password )
                     VALUES ('$Enrollnment_no',  '$email_id', '" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            //echo "<div class='form'>
                  //<p class='link'>Click here to <a href='TxnTest.php'>Registration</a></p>
                  //</div>";
                header('Location:TxnTest.php');  
                  
        } 
    } else {
       
?>
    <form class="form" action="" method="POST">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="input" name="Enrollnment_no" placeholder="Enrollnment_no" autofocus="true"required/>
        <input type="text" class="input" name="email_id" placeholder="Email Adress"required/>
        <input type="password" class="input" name="password" placeholder="Password"required/>
        <input type="submit" value="Registration" name="submit" class="login-button"/>
		
		
  </form>
<?php
    }
?>
</body>
</html>