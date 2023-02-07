
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Student Registration </title>
    <link rel="stylesheet" href="style.css"/>     
</head>
<body>
<?php
   include('includes/header.php');
   include('includes/navbar.php');   
    require_once "db.php";
    //session_start();
    if (isset($_POST['Enrollnment_No'])){
        $name =$_POST['Name'];  
        $email    =$_POST['Email']; 
        $password = $_POST['Password'];
        $address = $_POST['Address'];
        $Gender = $_POST['Gender'];
        $phone = $_POST['Phone'];
        $Branch = $_POST['Branch'];
        $Enroll= $_POST['Enrollnment_No'];
        $dob = date('Y-m-d', strtotime($_POST['dateofbirth']));
        $create_datetime = date("Y-m-d H:i:s");
        $Branch = $_POST['Branch'];
        $query    = "INSERT into `student_registration` (Name, Password, Email, create_datetime,Address,dateofbirth,Phone,Gender,Branch,Enrollnment_No)
                     VALUES ('$name', '" . md5($password) . "', '$email', '$create_datetime',' $address',' $dob','$phone','$Gender','$Branch','$Enroll')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            // echo header('Location:index.php');
            echo " 
                  <h3>You are registered successfully.</h3><br/>
                  
                  ";
        } else {
            echo "<div class='form'>
                  <h3>Something are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
    
        <h1 class="login-title"> Student Registration</h1>
        Student Name:
        <input type="text" class="login-input" name="Name" required /><br>
        Email Address:
        <input type="text" class="login-input" name="Email"required /><br>
        Password:
        <input type="password" class="login-input" name="Password" required/><br>
        Date of Birth:
        <input type="date" name="dateofbirth" class="login-input" required/><br>
        Phone Number:
        <input type="text" class="login-input" name="Phone" required/><br>
        Gender:<br>
        <input type="radio" name="Gender" value="Male" required/>Male 
        <input type="radio" name="Gender" value="Female"/>Female
        <input type="radio" name="Gender" value="Other"/>Other<br>
        Address:
        <input type="text" class="login-input" name="Address" required/><br>
        Branch:<br>
        <input type="radio" name="Branch" value="Computer Technology" required/>Computer Technology<br> 
        <input type="radio" name="Branch" value="Electrical"/>Electrical<br>
        <input type="radio" name="Branch" value="Electronics"/>Electronics<br>
        <input type="radio" name="Branch" value="Civil"/>Civil<br>
        <input type="radio" name="Branch" value="Mechanical"/>Mechanical<br>
        Enrollnment No:<br>
        <input type="text" class="login-input" name="Enrollnment_No" required/><br>
        <input type="submit" name="submit" value="Register" class="login-button"/>
        <p class="link"><a href="login.php">Click to Login</a></p>
       
   </form>
<?php
	
	}
    include('includes/scripts.php');
    include('includes/footer.php');
?>
</body>
</html>