	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.student.php");
			extract($_POST);
			$lgn = new STUDENT();
			if($lgn->save($firstname,$lastname,$studentid,$address,$age,$phone))
			{
				echo 'Student Added';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	