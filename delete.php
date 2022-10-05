  <?php
	include "Database.php";
	
		$db=new Database();
		$db->deleteRow('users',array('id'=>'4'));
		
		echo "Record Deleted Successfully!!!!!!!!!!!!!!";
	
 
 ?> 