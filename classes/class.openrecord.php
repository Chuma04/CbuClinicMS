<?php
include_once("Context.php");
require_once('settings/connectionsettings.php');
//include_once("classes/class.student.php");
include_once("sendsms.php");

class OPENRECORD{
	
 var $id;
 var $studentid; 	 		 		 	 	 	
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
  		$stmt = $Myconnection->prepare("SELECT * FROM openrecord WHERE ID=?");
		$stmt->bindParam(1, $id);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
			foreach($stmt->fetchAll() as $k=>$v) 
			{ 	
				 $this->id= $v["ID"];
				 $this->studentid= $v["STUDENTID"]; 	 		 	 	
				 $this->status= $v["STATUS"];
				 $this->regdate = $v["REGDATE"];				
			}		  
  	}
  }

  function save($studentid,$status=null)
  {
      $saved = false;
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("INSERT INTO openrecord(studentid,STATUS) VALUES(?,'0')");
		$stmt->bindParam(1, $studentid);																										
		$stmt->execute();
        $saved = true;

		 return true;
		 
	  }catch(exception $ex)
	  {
		  return false;
	  } finally {
          if($saved){
              $stdnt = new STUDENT();
              $student = $stdnt->getStudentByStudentId($studentid);
              $phone   = $student->phone;
              $fname   = $student->firstname;
              $lname   = $student->lastname;
              send_sms("Hello ".$fname. " ".$lname.". A record under your name has been opened. Go to room number 4 at the CBU clinic for your 
					vitals collection."
                  , $phone);
          }

      }
  }
  
  
  
   function edit($id,$status)
  {
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("UPDATE openrecord SET STATUS=? WHERE ID=?");							
		$stmt->bindParam(1, $status);				
		$stmt->bindParam(2, $id);				
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
  		$stmt = $Myconnection->prepare("DELETE FROM openrecord WHERE ID=?");
		$stmt->bindParam(1, $id);								
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }

  // function to return one open record by record id
  function getOpenRecord($recordid)
  {
      try {
          global $Myconnection;
          $stmt = $Myconnection->prepare("SELECT * FROM openrecord WHERE ID=?");
          $stmt->bindParam(1, $recordid);
          $stmt->execute();
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $openrecord = new OPENRECORD();

            foreach ($stmt->fetchAll() as $v) {
                $openrecord->id = $v["ID"];
                $openrecord->studentid = $v["STUDENTID"];
                $openrecord->status = $v["STATUS"];
                $openrecord->regdate = $v["REGDATE"];
            }
            return $openrecord;

      } catch (exception $ex) {
          return false;
      }
  }


  function getOpenRecords($date=null,$status=null)
  {
	  try
	  {
		global $Myconnection;
		if($date==null){
			if($status==null){
				$stmt = $Myconnection->prepare("SELECT * FROM openrecord");	
			}
			else
			{
				$stmt = $Myconnection->prepare("SELECT * FROM openrecord WHERE STATUS=".$status);	
			}
		}else
		{
			if($status==null)
			{
				$stmt = $Myconnection->prepare("SELECT * FROM openrecord WHERE CAST(REGDATE AS DATE)=CAST('".$date."' AS DATE)");
			}
			else
			{			
				$stmt = $Myconnection->prepare("SELECT * FROM openrecord WHERE CAST(REGDATE AS DATE)=CAST('".$date."' AS DATE) AND STATUS=".$status);
			}
		}		
		$stmt->execute() ;
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$records = array();
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $openrec = new OPENRECORD();
			 $openrec->id= $v["ID"];
			 $openrec->studentid= $v["STUDENTID"]; 	 			 	
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