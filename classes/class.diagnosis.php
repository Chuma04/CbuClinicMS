<?php
include_once("Context.php");
require_once('settings/connectionsettings.php');
class DIAGNOSIS{
	
 var $id;
 var $recordid; 	 		 		 	 	 	
 var $diagnosis; 	 		 		 	 	 	 		 		 	 	 	
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
  		$stmt = $Myconnection->prepare("SELECT * FROM diagnosis WHERE ID=?");
		$stmt->bindParam(1, $id);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $this->id= $v["ID"];
			 $this->recordid= $v["RECORDID"]; 	 		 	 	
			 $this->diagnosis= $v["DIAGNOSIS"]; 	 		 	 	 		 	 	
			 $this->status= $v["STATUS"];
			 $this->regdate = $v["REGDATE"];				
		}		  
  	}
  }

  function save($recordid,$diagnosis)
  {
	  try
	  {

		global $Myconnection;
  		$stmt = $Myconnection->prepare("INSERT INTO diagnosis(RECORDID,DIAGNOSIS,STATUS) VALUES(?,?,'0')");
		$stmt->bindParam(1, $recordid);																										
		$stmt->bindParam(2, $diagnosis);																																																		
		$stmt->execute();
		 return true;
		 
	  }catch(exception $ex)
	  {
		 echo $ex->getMessage();
		  return false;
	  }
  }
  
  
  
   function edit($id,$diagnosis)
  {
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("UPDATE diagnosis SET DIAGNOSIS=? WHERE ID=?");							
		$stmt->bindParam(1, $id);				
		$stmt->bindParam(2, $diagnosis);				
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
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
  		$stmt = $Myconnection->prepare("DELETE FROM diagnosis WHERE ID=?");
		$stmt->bindParam(1, $id);								
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }
  
  

  function getDiagnosis($recordId)
  {
	  try
	  {
		global $Myconnection;
		$stmt = $Myconnection->prepare("SELECT * FROM diagnosis WHERE RECORDID=".$recordId);	
		$stmt->execute() ;
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$records = array();
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $openrec = new DIAGNOSIS();
			 $openrec->id= $v["ID"];
			 $openrec->recordid= $v["RECORDID"]; 	 		 	 	
			 $openrec->diagnosis= $v["DIAGNOSIS"]; 	 		 	 	 		 	 	
			 $openrec->status= $v["STATUS"];
			 $openrec->regdate = $v["REGDATE"];
			 $records[] = $openrec;
		}	
		return $records;
	  }catch(Exception $ex)
	  {
		  return false;
	  }
  }


}
?>