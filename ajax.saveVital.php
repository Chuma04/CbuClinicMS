	<?php
	require_once('settings/');
	include_once("sendsms.php");

	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.vital.php");
			extract($_POST);
			$lgn = new VITAL();
			if($lgn->save($id,$bp,$temp))
			{
				//send_sms("Your BP is ".$bp." and your temperature is ".$temp.".",$phone);
				echo 'Vitals Added';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	