<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){}
			
			include("classes/class.openrecord.php");
			include("classes/class.student.php");
			include_once("sendsms.php");

			extract($_GET);
			extract($_POST);
			$student = new STUDENT();
			$opnrc = new OPENRECORD();
			$count =1;
			if($opnrc->save($studentId))
			{
				echo 'Record opened';
				// send sms to the student with id $studentId
				$student->getStudentByStudentId($studentId);
				$phone = $student->phone;
				send_sms("Your record has been opened. Go to room number 4 at the CBU clinic for your 
					vitals collection."
					, $phone);
			}
			else
			{
				echo 'Something went wrong.';
			}
?>



	