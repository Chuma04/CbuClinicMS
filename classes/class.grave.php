<?php
include_once("Context.php");
require_once('settings/connectionsettings.php');
class GRAVE{
	
 var $id;
 var $date; 	 		 	
 var $firstName; 	 	
 var $lastName; 	 	
 var $nrc; 	 	
 var $description; 	 	
 var $image; 	 	
 var $barcode; 	 	
 var $lat; 	 	
 var $lng; 	 	
 var $city; 	 	
 var $regdate;
 
  function __construct($id=NULL)
  {
  	if($id==NULL)
	{

  	}
  	else
	{
    	global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM grave WHERE ID=?");
		$stmt->bindParam(1, $id);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
			foreach($stmt->fetchAll() as $k=>$v) 
			{ 	
				 $this->id= $v["ID"];
				 $this->date= $v["DATE"]; 	 		
				 $this->firstName= $v["FIRST_NAME"]; 	 	
				 $this->lastName= $v["LAST_NAME"]; 	 	
				 $this->nrc= $v["NRC"]; 	 	
				 $this->lat= $v["LAT"]; 	 	
				 $this->lng= $v["LNG"]; 	 	
				 $this->description= $v["DESCRIPTION"]; 	 	
				 $this->image= $v["IMAGE"];
				 $this->barcode= $v["BARCODE"];
				 $this->city= $v["CITY"];
				 $this->regdate = $v["REG_DATE"];				
			}		  
  	}
  }

  function save($date,$firstName,$lastName,$nrc,$description,$image,$city,$lat,$lng)
  {
	  try
	  {
		  if($this->nrcExists($nrc))
		  {
			  echo '<br/>There is already a grave with the same nrc.<br/>';
			  return false;
		  }
		$imageName = time().'.jpg';
		$imagePath = 'images/'.$imageName;
		
		$barcode = time();
		global $Myconnection;
  		$stmt = $Myconnection->prepare("INSERT INTO grave(DATE,FIRST_NAME,LAST_NAME,NRC,DESCRIPTION,IMAGE,CITY,BARCODE,LAT,LNG) VALUES(?,?,?,?,?,?,?,?,?,?)");
		$stmt->bindParam(1, $date);							
		$stmt->bindParam(2, $firstName);							
		$stmt->bindParam(3, $lastName);							
		$stmt->bindParam(4, $nrc);							
		$stmt->bindParam(5, $description);							
		$stmt->bindParam(6, $imageName);													
		$stmt->bindParam(7, $city);													
		$stmt->bindParam(8, $barcode);													
		$stmt->bindParam(9, $lat);													
		$stmt->bindParam(10, $lng);													
		$stmt->execute();
		
		 if(file_put_contents($imagePath, base64_decode($image)) != false)
		 {
			
		 }
		 return true;
	  }catch(exception $ex)
	  {
		  echo $ex->getMessage();
		  return false;
	  }
  }
  
  function edit($id,$date,$firstName,$lastName,$nrc,$description,$city)
  {
	  try
	  {
		  if(!$this->safeToEdit($id,$nrc))
		  {
			  echo '<br/>There is already a grave with the same name.<br/>';
			  return false;
		  }
		global $Myconnection;
		$user = 0;
  		$stmt = $Myconnection->prepare("UPDATE grave SET DATE=?,FIRST_NAME=?,LAST_NAME=?,NRC=?,DESCRIPTION=?,CITY=? WHERE ID=?");
		$stmt->bindParam(1, $date);													
		$stmt->bindParam(2, $firstName);							
		$stmt->bindParam(3, $lastName);							
		$stmt->bindParam(4, $nrc);							
		$stmt->bindParam(5, $description);							
		$stmt->bindParam(6, $city);							
		$stmt->bindParam(7, $id);				
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }
  
  
  function nrcExists($nrc)
  {
	  try
	  {
		  global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM grave WHERE NRC=?");	
		$stmt->bindParam(1, $nrc);				
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
  
   function safeToEdit($id,$nrc)
  {
	  try
	  {
		  global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT NRC FROM grave WHERE NRC=? AND ID<>?");	
		$stmt->bindParam(1, $nrc);				
		$stmt->bindParam(2, $id);				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			return false;
		}
		return true;		
	  }catch(Exception $rd)
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
  		$stmt = $Myconnection->prepare("DELETE FROM grave WHERE ID=?");
		$stmt->bindParam(1, $id);								
		$stmt->execute();
		 return true;
	  }catch(exception $ex)
	  {
		  return false;
	  }
  }
  
  
  function getGraves()
  {
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM grave");				
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$graves = array();
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $grave = new GRAVE();
			 $grave->id= $v["ID"];
			 $grave->date= $v["DATE"]; 	 		
			 $grave->firstName= $v["FIRST_NAME"]; 	 	
			 $grave->lastName= $v["LAST_NAME"]; 	 	
			 $grave->nrc= $v["NRC"]; 	 	
			 $grave->description= $v["DESCRIPTION"]; 	 	
			 $grave->image= $v["IMAGE"];
			 $grave->city= $v["CITY"];
			 $grave->lat= $v["LAT"];
			 $grave->lng= $v["LNG"];
			 $grave->barcode= $v["BARCODE"];
			 $grave->regdate = $v["REG_DATE"];		
			$graves[] = $grave;
		}	
		return $graves;
	  }catch(Exception $ex)
	  {
		  return false;
	  }
  }
  
  function getGrave($barcode)
  {
	  try
	  {
		global $Myconnection;
  		$stmt = $Myconnection->prepare("SELECT * FROM grave WHERE BARCODE=?");	
		$stmt->bindParam(1, $barcode);			
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$graves = array();
		foreach($stmt->fetchAll() as $k=>$v) 
		{ 	
			 $grave = new GRAVE();
			 $grave->id= $v["ID"];
			 $grave->date= $v["DATE"]; 	 		
			 $grave->firstName= $v["FIRST_NAME"]; 	 	
			 $grave->lastName= $v["LAST_NAME"]; 	 	
			 $grave->nrc= $v["NRC"]; 	 	
			 $grave->description= $v["DESCRIPTION"]; 	 	
			 $grave->image= $v["IMAGE"];
			 $grave->city= $v["CITY"];
			 $grave->lat= $v["LAT"];
			 $grave->lng= $v["LNG"];
			 $grave->barcode= $v["BARCODE"];
			 $grave->regdate = $v["REG_DATE"];		
			$graves[] = $grave;
		}	
		return $graves;
	  }catch(Exception $ex)
	  {
		  return false;
	  }
  }


}
?>