	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.openrecord.php");
			extract($_POST);
			$lgn = new OPENRECORD();
			if($lgn->edit($id,$status))
			{
				echo 'Vitals Added';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	