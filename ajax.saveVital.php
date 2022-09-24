	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.vital.php");
			extract($_POST);
			$lgn = new VITAL();
			if($lgn->save($id,$bp,$temp))
			{
				echo 'Vitals Added';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	