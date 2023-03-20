<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
</head>
<body>
<?php
    require('dbconfig.php');
    session_start();
   
// When form submitted, check and create user session.
    if (isset($_REQUEST['ENROLMENT_NO'])) {
        // removes backslashes
          // $_SESSION['ENROLMENT_NO']="$Enrollnment_no";

        $Enrollnment_no = stripslashes($_REQUEST['ENROLMENT_NO']);
        //escapes special characters in a string
        $Enrollnment_no = mysqli_real_escape_string($conn, $Enrollnment_no);//echo here enrol no
         $_SESSION['ENROLMENT_NO']="$Enrollnment_no";
         echo $_SESSION['ENROLMENT_NO'];
        
        $email_id    = stripslashes($_REQUEST['Email']);
        $email_id    = mysqli_real_escape_string($conn, $email_id);
        $password = stripslashes($_REQUEST['PASSWORD']);
        $password = mysqli_real_escape_string($conn, $password);
        
        $query    = "INSERT into `payment_information` (ENROLMENT_NO, Email,PASSWORD )
                     VALUES ('$Enrollnment_no',  '$email_id', '" . md5($password) . "')";
        $result   = mysqli_query($conn, $query);
     

        if ($result) {
            //echo "<div class='form'>
                  //<p class='link'>Click here to <a href='TxnTest.php'>Registration</a></p>
                  //</div>";
              header('Location:pgResponse.php');  
                  
        } 
    } else {
       
?>
    <form class="form" action="TxnTest.php" method="POST">
        <h1 class="login-title">Registration</h1>
        <label> Enrollment No :: <input type="text" class="input" name="ENROLMENT_NO" placeholder="Enrollnment_no" autofocus="true"required/></lebal>
        <br>
        <br>
        <lebal> Email Id :: <input type="text" class="input" name="Email" placeholder="Email Adress"required/></label>
            <br>
             <br>
       <label> Password  :: <input type="password" class="input" name="PASSWORD" placeholder="Password"required/></label>
       <br>
       <br>
        <input type="submit" value="Registration" name="submit" class="login-button"/>
		
		
  </form>
<?php
    }
    
?>
</body>
</html>