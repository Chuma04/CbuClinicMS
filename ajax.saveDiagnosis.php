	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.diagnosis.php");
			extract($_POST);
			$lgn = new DIAGNOSIS();
			if($lgn->save($id,$diagnosis))
			{
				echo 'Diagnosis Added';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	