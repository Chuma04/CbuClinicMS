<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){}
			
			include("classes/class.student.php");
			extract($_GET);
			extract($_POST);
			$std = new STUDENT();
			$count =1;
			foreach($std->getStudents() as $usr)
			{
				echo '<tr>
				
					<td>
					'.$count.'
					</td>
					<th>'.$usr->firstname.'</th>
					<th>'.$usr->lastname.'</th>
					<th>'.$usr->studentid.'</th>
					<th>'.$usr->address.'</th>
					<th>'.$usr->age.'</th>
					<th>'.$usr->phone.'</th>
					<td>
						<button onclick="deleteModal('.$usr->id.')" class="btn btn-danger"><i class=" fa fa-trash"></i> Delete</button>
						<button onclick="generateBar('.$usr->studentid.')" class="btn btn-primary"><i class=" fa fa-barcode"></i> Get Barcode</button>
					</td>
					
					</tr>';
					$count++;
			}
	
		
?>



	