<?php
include_once("Context.php");
require_once('settings/connectionsettings.php');
class LOGIN{
	
 var $id;
 var $username; 	 		 		 	 	 	
 var $status;
 var $type;
 var $regdate;
 
  function __construct($id=NULL)
  {
  	if($id==NULL)
	{

  	}
  	else
	{
    	global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM login WHERE ID=?");
		$stmt->bindParam(1, $id);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
			foreach($stmt->fetchAll() as $k=>$v) 
			{ 	
				 $this->id= $v["ID"];
				 $this->username= $v["USERNAME"]; 	 		 	 	
				 $this->status= $v["STATUS"];
				 $this->type= $v["TYPE"];
				 $this->regdate = $v["REGDATE"];				
			}		  
  	}
  }

  function save($username,$password,$type)
  {
	  try
	  {
		  if($this->emailExists($username))
		  {
			  echo '<br/>There is already an email address with the same name.<br/>';
			  return false;
		  }
		$password = md5($password);
		$user = 0;
		global $Myconnection;
  		$stmt = $Myconnection->prepare("INSERT INTO login(USERNAME,PASSWORD,TYPE,STATUS) VALUES(?,?,?,'active')");
		$stmt->bindParam(1, $username);							
		$stmt->bindParam(2, $password);																			
		$stmt->bindParam(3, $type);																			
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }
  
  
  function resetPassword($id,$password)
  {
	 try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("UPDATE login SET PASSWORD=? WHERE ID=?");
		$stmt->bindParam(1, $password);														
		$stmt->bindParam(2, $id);				
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
  		$stmt = $Myconnection->prepare("SELECT * FROM login WHERE USERNAME=?");	
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
  		$stmt = $Myconnection->prepare("DELETE FROM login WHERE ID=?");
		$stmt->bindParam(1, $id);								
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }
  
  
  function authenticate($username,$password)
  {
	  try
	  {
		global $Myconnection;
		$password = md5($password);
  		$stmt = $Myconnection->prepare("SELECT * FROM login WHERE USERNAME=? AND PASSWORD=?");
		$stmt->bindParam(1, $username);		
		$stmt->bindParam(2, $password);		
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		foreach($stmt->fetchAll() as $k=>$v) 
		{
			return new LOGIN($v["ID"]);
		}
		  return false;
	  }catch(exception $ex)
	  {
		  return false;
	  }
	  
  }
  
  function getLogins()
  {
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM login");				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$logins = array();
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $login = new LOGIN();
			 $login->id= $v["ID"];
			 $login->username= $v["USERNAME"]; 	 			 	
			 $login->type= $v["TYPE"];
			 $login->status= $v["STATUS"];
			 $login->regdate = $v["REGDATE"];	
			 $logins[] = $login;
		}	
		return $logins;
	  }catch(Exception $ex)
	  {
		  return false;
	  }
  }


}
?>