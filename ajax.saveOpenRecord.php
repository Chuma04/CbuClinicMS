<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){}
			
			include("classes/class.openrecord.php");
			include("classes/class.student.php");
			extract($_GET);
			extract($_POST);
			$student = new STUDENT();
			$opnrc = new OPENRECORD();
			$count =1;
			if($opnrc->save($studentId))
			{
				echo 'Record opened';
				
			}else
			{
				echo 'Something went wrong.';
			}
	
		
?>



	