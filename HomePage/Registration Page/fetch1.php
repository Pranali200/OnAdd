<?php
require_once "db.php";
        session_start();
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
        
        
        echo $name ;<br>
        echo $email;
        echo $address ;
        echo $Gender;
        echo $phone ;
        echo $Branch;
        echo $create_datetime ;
        
       ?>
    </body>
</html>