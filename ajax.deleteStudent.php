	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		extract($_POST);
			include("classes/class.student.php");
			$std = new STUDENT();
			if($std->delete($id))
			{
				echo 'Student deleted';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	