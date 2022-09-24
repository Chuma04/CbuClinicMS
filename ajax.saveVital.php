<?php
	include_once("sendsms.php");

	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.vital.php");
			include("classes/class.student.php");
			include("classes/class.openrecord.php");

			extract($_POST);
			$lgn = new VITAL();
			if($lgn->save($id,$bp,$temp))
			{
				echo 'Vitals Added';

				//send sms to the student with and open record of id $id
				$rcrd = new OPENRECORD();
				$record = $rcrd->getOpenRecord($id);

				$stdnt = new STUDENT();
				$student = $stdnt->getStudentByStudentId($record['studentId']);
				$phone = $student['phone'];

				send_sms("Your BP is ".$bp." and your temperature is ".$temp.
					". Go to room ". $room . " and see ".$doctor.
					" for your checkup." ,$phone);
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	