<?php
//$connection = mysql_connect("localhost", "root", ""); 
//$db = mysql_select_db("newlogin", $connection); 
require_once "config.php";


if(isset($_POST['submit'])){ 
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$createdOn = date("Y-m-d H:i:s");
	$submit = $_POST['submit'];
	if($name !=''||$comment !=''){
		
		$query =  "insert into comment(name,comment,createdOn) values ('$name', '$comment','$createdOn')";
		
		if (mysqli_query($link, $query)) {
		 echo "comment added successfully";
		} else {
		 echo "Error: " . $query . "<br>" . mysqli_error($link);
		}
		//echo "<br/><br/><span>Data Inserted successfully...!!</span>";
		}
		else{
		echo "<p>Insertion Failed <br/> Insert something ....!!</p>";
		}
	  }
	?>
<!DOCTYPE html>
<html>
<head>
<title>ADD COMMENT</title>
<link href="comments.css" rel="stylesheet">
</head>
<body>
<div class="maindiv">

	<div class="form_div">
		<div class="title">
		<h2>ADD COMMENT</h2>
		</div>
		<form action="addComment.php" method="post" align="Center" name="myform">

		
		<label> Name:</label>
		                  <input class="input" name="name" placeholder="Enter Name" type="text" value="">
		                  <label>Comment:</label>
		                  <textarea name="comment" class="textarea1"   placeholder="Enter Comment"></textarea><br>
		                  <input class="submit" name="submit" type="submit" value="ADD COMMENT">
						  <input type="button" value="DELETE COMMENT" class="submit" id="btnHome" onClick="window.location.href = 'deletecomment.php';" />
<input type="button" value="UPDATE COMMENT" class="submit" id="btnHome" onClick="window.location.href = 'updatecomment.php';" />
<input type="button" value="SEARCH COMMENT" class="submit" id="btnHome" onClick="window.location.href = 'searchcomment.php';" />
</form>

</div>
</div>
</body>
</html>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

function openLink() {
  window.open("addComment.php");
}
</script>
</body>

