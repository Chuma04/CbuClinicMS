<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.labentry.php");
			extract($_POST);
			$lgn = new LABENTRY();
			foreach($lgn->getLabEntry($id) as $v)
			{
				echo 'Report : '.$v->labresult;
			}
	}
?>