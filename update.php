 <?php
	include "Database.php";
	$db=new Database();
	if(isset($_POST['submit']))
	{
		$user=$_POST['username'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$id=$_POST['id'];
		$db->updateRow(array('user_name'=>$user,'user_email'=>$email,'user_pass'=>$pass),'users',array('id'=>$id));
		$location="formupdate.php";
		header("Location: $location");
		
	}
 
 ?> 