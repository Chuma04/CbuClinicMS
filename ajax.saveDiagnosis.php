	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.diagnosis.php");
			include("classes/class.student.php");
			include("classes/class.openrecord.php");

			extract($_POST);
			$lgn = new DIAGNOSIS();
			if($lgn->save($id,$diagnosis, $referal, $prescription))
			{
				echo 'Diagnosis Added';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	