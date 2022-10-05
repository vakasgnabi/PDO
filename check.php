 <?php
 
 function die_r($value){
	 
	 echo '<pre>';
	 print_r($value);
	 echo '</pre>';
	 die();
	 
 }
 
 require_once 'Database.php';
 
 $db=new Database();
 
 $getRow=$db->getRow(['user_name','user_email'],"users",['id'=>3]);
 
 echo $getRow["user_name"]."<br />";
 
 $getAllRows=$db->getAllRows(['*'],"users");
 
 
 foreach($getAllRows as $gt){
	 echo $gt['user_name']."<br />";
 }
 
  die_r($getAllRows);