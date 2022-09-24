<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.diagnosis.php");
			extract($_POST);
			$lgn = new DIAGNOSIS();
			foreach($lgn->getDiagnosis($id) as $v)
			{
				echo 'Diagnosis : '.$v->diagnosis;
			}
	}
?>