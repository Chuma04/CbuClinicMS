<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){}
			
			include("classes/class.student.php");
			extract($_GET);
			extract($_POST);
			$std = new STUDENT();
			$count =1;
			foreach($std->getStudentByStudentId($studentId) as $usr)
			{
				echo json_encode($usr);
			}
	
		
?>



	