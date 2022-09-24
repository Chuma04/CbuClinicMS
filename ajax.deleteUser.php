	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		extract($_POST);
			include("classes/class.login.php");
			$login = new LOGIN();
			if($login->delete($id))
			{
				echo 'User deleted';
			}else
			{
				echo 'Something went wrong.';
			}
	}
?>



	