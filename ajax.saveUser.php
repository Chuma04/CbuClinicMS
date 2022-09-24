<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include("classes/class.login.php");
			extract($_POST);
			$lgn = new LOGIN();
			if($lgn->save($username,$password,$type))
			{
				echo 'User Added';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	