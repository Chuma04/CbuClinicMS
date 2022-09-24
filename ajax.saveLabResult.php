	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.labentry.php");
			extract($_POST);
			$lgn = new LABENTRY();
			if($lgn->save($id,$labresult))
			{
				echo 'Vitals Added';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	