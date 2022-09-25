<?php
include_once("Context.php");
require_once('settings/connectionsettings.php');
class STUDENT{
	
 var $id;
 var $firstname; 	 		 		 	 	 	
 var $lastname;
 var $studentid;
 var $address;
 var $age;
 var $phone;
 var $status;
 var $regdate;

  function __construct($id=NULL)
  {
  	if($id==NULL)
	{

  	}
  	else
	{
    	global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM student WHERE ID=?");
		$stmt->bindParam(1, $id);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
			foreach($stmt->fetchAll() as $k=>$v) 
			{ 	
				 $this->id= $v["ID"];
				 $this->firstname= $v["FIRSTNAME"]; 	 		 	 	
				 $this->lastname= $v["LASTNAME"]; 	 		 	 	
				 $this->studentid= $v["STUDENTID"]; 	 		 	 	
				 $this->address= $v["ADDRESS"]; 	 		 	 	
				 $this->age= $v["AGE"]; 	 		 	 	
				 $this->phone= $v["PHONE"];
				 $this->status= $v["STATUS"];
				 $this->regdate = $v["REGDATE"];				
			}		  
  	}
  }

  function save($firstname,$lastname,$studentid,$address,$age,$phone)
  {
	  try
	  {
		  if($this->emailExists($studentid))
		  {
			  echo '<br/>There is already a student with the same studnetID.<br/>';
			  return false;
		  }
		
		global $Myconnection;
  		$stmt = $Myconnection->prepare("INSERT into student(FIRSTNAME,LASTNAME,STUDENTID,ADDRESS,AGE,PHONE,STATUS) VALUES(?,?,?,?,?,?,'active')");
		$stmt->bindParam(1, $firstname);							
		$stmt->bindParam(2, $lastname);																			
		$stmt->bindParam(3, $studentid);																			
		$stmt->bindParam(4, $address);																			
		$stmt->bindParam(5, $age);																			
		$stmt->bindParam(6, $phone);																			
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }
  
  
  
  
  function emailExists($email)
  {
	  try
	  {
		  global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM student WHERE STUDENTID=?");	
		$stmt->bindParam(1, $email);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			return true;
		}
		return false;		
	  }catch(Exception $rd)
	  {
		  return true;
	  }
  }
  
  
  
  function delete($id=null)
  {
	   try
	  {
		  if($id==null)
		  {
			  $id = $this->id;
		  }
		global $Myconnection;
  		$stmt = $Myconnection->prepare("DELETE FROM student WHERE ID=?");
		$stmt->bindParam(1, $id);								
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }
  
  
  
  
  function getStudents()
  {
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM student");				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$students = array();
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $student = new STUDENT();
			 $student->id= $v["ID"];
			 $student->firstname= $v["FIRSTNAME"]; 	 		 	 	
			 $student->lastname= $v["LASTNAME"]; 	 		 	 	
			 $student->studentid= $v["STUDENTID"]; 	 		 	 	
			 $student->address= $v["ADDRESS"]; 	 		 	 	
			 $student->age= $v["AGE"]; 	 		 	 	
			 $student->phone= $v["PHONE"];
			 $student->status= $v["STATUS"];
			 $student->regdate = $v["REGDATE"];
			 $students[] = $student;
		}	
		return $students;
	  }catch(Exception $ex)
	  {
		  return false;
	  }
  }
  
    function getStudentByStudentId($StudentId)
  {
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM student WHERE STUDENTID=".$StudentId);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		//$students = array();
        $student = new STUDENT();
		foreach($stmt->fetchAll() as $k=>$v)
		{ 	
			 //$student = new STUDENT();
			 $student->id= $v["ID"];
			 $student->firstname= $v["FIRSTNAME"]; 	 		 	 	
			 $student->lastname= $v["LASTNAME"]; 	 		 	 	
			 $student->studentid= $v["STUDENTID"]; 	 		 	 	
			 $student->address= $v["ADDRESS"]; 	 		 	 	
			 $student->age= $v["AGE"]; 	 		 	 	
			 $student->phone= $v["PHONE"];
			 $student->status= $v["STATUS"];
			 $student->regdate = $v["REGDATE"];
			 //$students[] = $student;
		}	
		return $student;
	  }catch(Exception $ex)
	  {
		  return false;
	  }
  }
}
?>