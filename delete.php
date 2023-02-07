<?php

include "db.php"; // Using database connection file here

$Enrollnment_No = $_GET['Enrollnment_No']; // get id through query string

$del ="delete from student_registration where Enrollnment_No = '$Enrollnment_No'"; // delete query
$result = mysqli_query($con, $del) or die(mysql_error());
        $rows = mysqli_num_rows($result);
if($result )
{
    //mysqli_close($db); // Close connection
    header("location:all_records.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>