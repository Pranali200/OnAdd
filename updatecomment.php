<?php

require_once "config.php";

if(isset($_POST['submit'])){ 
$name = $_POST['name'];
$FnameOld = $_POST['FnameOld'];
$comment = $_POST['comment'];


if($comment !=''||$FnameOld !=''){
	
$Squery =  "UPDATE `comment` SET `name`= '$name',`comment` = '$comment' WHERE comment = '$FnameOld'";

if (mysqli_query($link, $Squery)) {
 echo "record updated successfully";
} else {
 echo "Error: " . $Squery . "<br>" . mysqli_error($link);
}

}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Update Comment</title>
<link href="comments.css" rel="stylesheet">
</head>
<body>
<div class="maindiv">

<div class="form_div">
<div class="title">
<h2>Update Comment</h2>
</div>
<form action="updatecomment.php" method="post">
<label>Name:</label>
<input class="input" name="name" type="text" value="">
<label>Old comment:</label>
<input class="input" name="FnameOld" type="text" value="">
<label>New comment:</label>
<input class="input" name="comment" type="text" value="">
<input class="submit" name="submit" type="submit" value="UPDATE COMMENT">
<input type="button" value="ADD COMMENT" class="submit" id="btnHome" onClick="window.location.href = 'addComment.php';" />
<input type="button" value="DELETE COMMENT" class="submit" id="btnHome" onClick="window.location.href = 'deletecomment.php';" />
<input type="button" value="SEARCH COMMENT" class="submit" id="btnHome" onClick="window.location.href = 'searchcomment.php';" />




</form>
</div>
</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

function openLink() {
  window.open("updatecomment.php");
}
</script>
</body>

</body>
</html>
