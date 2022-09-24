<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){}
			
			include("classes/class.login.php");
			extract($_GET);
			extract($_POST);
			$login = new LOGIN();
			$count =1;
			foreach($login->getLogins() as $lgn)
			{
				echo '<tr>
				
					<td>
					'.$count.'
					</td>
					
					<td>
					'.$lgn->username.'
					</td>
					
					<td>
					'.$lgn->type.'
					</td>
					
					<td>
						<button onclick="deleteModal('.$lgn->id.')" class="btn btn-danger"><i class=" fa fa-trash"></i> Delete</button>
					</td>
					
					</tr>';
					$count++;
			}
	
		
?>



	