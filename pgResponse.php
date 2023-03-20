<?php

session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
require('db.php');

//$Enrollnment_no=$_SESSION['Enrollnment_no'];
	//echo $Enrollnment_no;
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//$Enrollnment_no=$_SESSION['Enrollnment_no'];
	       //echo $Enrollnment_no;

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") 
{
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") { 
		//echo "  "
		
			$Enrollnment_no=$_SESSION['Enrollnment_no'];
	       echo $Enrollnment_no;
			//$Enrollnment_no = $_POST['Enrollnment_no'];
			//$Statusnew = $_POST['Statusnew'];
			//if($Statusnew !=''||$Status !=''){
			$squery=("UPDATE paymentkit SET Status ='Successfully'  WHERE  Enrollnment_no= $Enrollnment_no");
			$result1   = mysqli_query($con, $squery);
			if($result1){
				//$Enrollnment_no=$_SESSION['Enrollnment_no'];
	       //echo $Enrollnment_no;
				echo "Records were updated successfully.";
			
	
			}	
	   
	}else{
	echo "<b>Transaction status is failure</b>" . "<br/>";
}
}
	?>
	
<div class="text-center">
	<button onclick="window.print()" class="btn btn-primary"> print</button>
</div>

</body>
</html>