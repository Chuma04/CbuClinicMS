	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.vital.php");
			extract($_POST);
			$lgn = new VITAL();
			foreach($lgn->getVitals($id) as $v)
			{
				echo 'BP : '.$v->bp.'<br/> TEMP :  '.$v->temp.'';
			}
	}
?>



	