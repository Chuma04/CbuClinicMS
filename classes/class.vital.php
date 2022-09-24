<?php
include_once("Context.php");
require_once('settings/connectionsettings.php');
class VITAL{
	
 var $id;
 var $recordid; 	 		 		 	 	 	
 var $bp; 	 		 		 	 	 	
 var $temp; 	 		 		 	 	 	
 var $status;
 var $regdate;
 
	//RECORDID	BP	TEMP	STATUS	REGDATE	
	//recordid	bp	temp	status	regdate	


 
  function __construct($id=NULL)
  {
  	if($id==NULL)
	{

  	}
  	else
	{
    	global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM bpentry WHERE ID=?");
		$stmt->bindParam(1, $id);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $this->id= $v["ID"];
			 $this->recordid= $v["RECORDID"]; 	 		 	 	
			 $this->bp= $v["BP"]; 	 		 	 	
			 $this->temp= $v["TEMP"]; 	 		 	 	
			 $this->status= $v["STATUS"];
			 $this->regdate = $v["REGDATE"];				
		}		  
  	}
  }

  function save($recordid,$bp,$temp)
  {
	  try
	  {

		global $Myconnection;
  		$stmt = $Myconnection->prepare("INSERT INTO bpentry(RECORDID,BP,TEMP,STATUS) VALUES(?,?,?,'0')");
		$stmt->bindParam(1, $recordid);																										
		$stmt->bindParam(2, $bp);																										
		$stmt->bindParam(3, $temp);																										
		$stmt->execute();
		 return true;
		 
	  }catch(exception $ex)
	  {
		 echo $ex->getMessage();
		  return false;
	  }
  }
  
  
  
   function edit($id,$status)
  {
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("UPDATE bpentry SET STATUS=? WHERE ID=?");							
		$stmt->bindParam(1, $id);				
		$stmt->bindParam(2, $status);				
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
  		$stmt = $Myconnection->prepare("DELETE FROM bpentry WHERE ID=?");
		$stmt->bindParam(1, $id);								
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }
  
  

  function getVitals($recordId)
  {
	  try
	  {
		global $Myconnection;
		$stmt = $Myconnection->prepare("SELECT * FROM bpentry WHERE RECORDID=".$recordId);	
		$stmt->execute() ;
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$records = array();
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $openrec = new VITAL();
			 $openrec->id= $v["ID"];
			 $openrec->recordid= $v["RECORDID"]; 	 		 	 	
			 $openrec->bp= $v["BP"]; 	 		 	 	
			 $openrec->temp= $v["TEMP"]; 	 		 	 	
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