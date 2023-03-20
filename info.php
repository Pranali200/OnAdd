<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
    error_reporting(0);
	header("Expires: 0");
	session_start();
    include("dbconfig.php");

    if (isset($_SESSION['ENROLMENT_NO'])) {
        $Enrollment=$_SESSION['ENROLMENT_NO'];
        $$email=$_SESSION['EMAIL'];
        $$password=$_SESSION['PASSWORD'];
        # code...
    }else{
        $Enrollment=[];
        $email=[];
        $password=[];
    }
    if (isset($_POST['ENROLMENT_NO'])) {

        $Enrollment=$_POST['ENROLMENT_NO'];
        $email=$_POST['EMAIL'];
        $password=$_POST['PASSWORD'];
 $query="INSERT INTO payment_information VALUES ('$Enrollment','$email','$password')";
          $data=mysqli_query($conn,$query);
        # code...
    }
    $_SESSION['ENROLMENT_NO']=$Enrollment;
    $_SESSION['EMAIL']=$email;
    $_SESSION['PASSWORD']=$password;

?>

<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	
	<form method="POST" action="TxnTest.php">
    
    <br>
    <label>Enrollment No:<input id="ENROLMENT_NO" type="text" tabindex="4" size="50" name="ENROLMENT_NO" ></label><br>
    <br>
     <label>Email Id :<input id="EMAIL" type="email" tabindex="4" size="60" name="EMAIL" ></label><br>
    <br>
    <label> Password :<input id="PASSWORD" type="password" tabindex="4" size="20" name="PASSWORD"></label><br>
    <br>
    <input name="submit" type="submit" value="Submit">
</form>

</body>
</html>

