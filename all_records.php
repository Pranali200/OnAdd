<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2><center>Student Details</center></h2>
<table border=4px solid black align="center" style="margin: 0px auto;">

  <tr>
    <td>Name</td>
    <td>Email</td>
    <td>Branch</td>
    <td>Enrollnment_No</td>
    <td>Address</td>
    <td>Gender</td>
    <td>Phone</td>
    <td>Delete</td>
  </tr>
  
<?php
 include('includes/header.php');
 //include('includes/navbar.php');  
include "db.php"; // Using database connection file here


// SQL query to select data from database
$sql = "SELECT * FROM student_registration ORDER BY ID ASC ";
//$result = $mysqli->query($sql);
$result = mysqli_query($con, $sql) or die(mysql_error());
        $rows = mysqli_num_rows($result);
//$mysqli->close();
?>

<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			
?>
  <tr>
  <td><?php echo $rows['Name'];?></td>
				<td><?php echo $rows['Email'];?></td>
				<td><?php echo $rows['Branch'];?></td>
				<td><?php echo $rows['Enrollnment_No'];?></td>
                <td><?php echo $rows['Address'];?></td>
				<td><?php echo $rows['Gender'];?></td>
                <td><?php echo $rows['Phone'];?></td>
    <td><a href="delete.php?Enrollnment_No=<?php echo $rows['Enrollnment_No']; ?>">Delete</a></td>
</tr>	

<?php
}
include('includes/header.php');
//include('includes/navbar.php');  
?>
</table>

<center>

<button> <a href='index.php' alt='Broken Link'>Go Back</a></button>
</center>

</body>
</html>