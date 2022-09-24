<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){}
			
			include("classes/class.openrecord.php");
			include("classes/class.student.php");
			extract($_GET);
			extract($_POST);
			$student = new STUDENT();
			$opnrc = new OPENRECORD();
			$count =1;
			foreach($opnrc->getOpenRecords(null,$status) as $lgn)
			{
				
				$student = new STUDENT($lgn->studentid);
				
				echo '<tr>
				
					<td>
					'.$count.'
					</td>
					
					<th>'.$student->firstname.'</th>
					<th>'.$student->lastname.'</th>
					<th>'.$student->studentid.'</th>
					<th>'.$student->address.'</th>
					<th>'.$student->age.'</th>
					<th>'.$student->phone.'</th>
					
					<td>';
					
					if($status==0)
					{
						echo '	<button onclick="addVital('.$lgn->id.',1)" class="btn btn-danger"><i class=" fa fa-file"></i> Add Vitals </button>';
					}
					else if($status==1){
						echo '<button onclick="addDiagnosis('.$lgn->id.')" class="btn btn-warning"><i class=" fa fa-file"></i> Add Diagnosis </button>';
						echo '<button onclick="moveStatus('.$lgn->id.',2)" class="btn btn-success"><i class=" fa fa-arrow-right"></i> Send to Lab </button>';
						echo '<button onclick="moveStatus('.$lgn->id.',3)" class="btn btn-primary"><i class=" fa fa-arrow-left"></i> Send to Phamarcy </button>';
					}
					else if($status==2)
					{
						echo '<button onclick="addReport('.$lgn->id.')" class="btn btn-warning"><i class=" fa fa-file"></i> Add Report </button>';
					}
					else if($status==3)
					{
					
						echo '<button onclick="seeDiagnosis('.$lgn->id.')" class="btn btn-primary"><i class=" fa fa-arrow-left"></i> See Diagnosis </button>';
							echo '<button onclick="moveStatus('.$lgn->id.',4)" class="btn btn-danger"><i class=" fa fa-trash"></i> Close </button>';
					}
					
					
					echo '</td>
					
					</tr>';
					$count++;
			}
	
		
?>



	