<?php
include_once("Context.php");
require_once('settings/connectionsettings.php');
class LABENTRY{
	
 var $id;
 var $recordid; 	 		 		 	 	 	
 var $labresult; 	 		 		 	 	 	 		 		 	 	 	
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
  		$stmt = $Myconnection->prepare("SELECT * FROM labentry WHERE ID=?");
		$stmt->bindParam(1, $id);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $this->id= $v["ID"];
			 $this->recordid= $v["RECORDID"]; 	 		 	 	
			 $this->labresult= $v["LABRESULT"]; 	 		 	 	 		 	 	
			 $this->status= $v["STATUS"];
			 $this->regdate = $v["REGDATE"];				
		}		  
  	}
  }

  function save($recordid,$labresult)
  {
	  try
	  {

		global $Myconnection;
  		$stmt = $Myconnection->prepare("INSERT INTO labentry(RECORDID,LABRESULT,STATUS) VALUES(?,?,'0')");
		$stmt->bindParam(1, $recordid);																										
		$stmt->bindParam(2, $labresult);																																																		
		$stmt->execute();
		 return true;
		 
	  }catch(exception $ex)
	  {
		 echo $ex->getMessage();
		  return false;
	  }
  }
  
  
  
   function edit($id,$labresult)
  {
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("UPDATE labentry SET LABRESULT=? WHERE ID=?");							
		$stmt->bindParam(1, $id);				
		$stmt->bindParam(2, $labresult);				
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
  		$stmt = $Myconnection->prepare("DELETE FROM labentry WHERE ID=?");
		$stmt->bindParam(1, $id);								
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }
  
  

  function getLabEntry($recordId)
  {
	  try
	  {
		global $Myconnection;
		$stmt = $Myconnection->prepare("SELECT * FROM labentry WHERE RECORDID=".$recordId);	
		$stmt->execute() ;
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$records = array();
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $openrec = new LABENTRY();
			 $openrec->id= $v["ID"];
			 $openrec->recordid= $v["RECORDID"]; 	 		 	 	
			 $openrec->labresult= $v["LABRESULT"]; 	 		 	 	 		 	 	
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