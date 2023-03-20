<?php
 include("dbconfig.php");
 $query="INSERT INTO payment_information VALUES ('1234567','abhji@gmail.com','12235')";
 $data=mysqli_query($conn,$query);
 if ($data) {
    echo "string";
          	# code...
   }
?>