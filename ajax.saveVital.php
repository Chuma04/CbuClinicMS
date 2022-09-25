<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.vital.php");
			include("classes/class.student.php");
			include("classes/class.openrecord.php");

			extract($_POST);
			$lgn = new VITAL();
			if($lgn->save($id,$bp,$temp,$doctor,$room))
			{
				echo 'Vitals Added';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	