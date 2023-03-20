<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
session_start();
    require('db.php');
// When form submitted, check and create user session.
    if (isset($_POST['Enrollnment_no'])) {
        // removes backslashes
        $Enrollnment_no = stripslashes($_POST['Enrollnment_no']);
        $Enrollnment_no = mysqli_real_escape_string($con, $Enrollnment_no);
        $_SESSION['Enrollnment_no']= $Enrollnment_no;
       // echo $Enroll;
        $email_id    = stripslashes($_POST['email']);
        $email_id    = mysqli_real_escape_string($con, $email_id);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        //$_SESSION['Enrollnment_no']=$var1;
        $query    = "INSERT into `paymentkit` (Enrollnment_no, email,password )
                     VALUES ('$Enrollnment_no',  '$email_id', '" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        //$_SESSION['result']=$result;
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
        <input type="text" class="input" name="email" placeholder="Email Adress"required/>
        <input type="password" class="input" name="password" placeholder="Password"required/>
        <input type="submit" value="Registration" name="submit" class="login-button"/>
		
		
  </form>
<?php
    }
?>
</body>
</html>