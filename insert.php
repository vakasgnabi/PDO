<?php
	include "Database.php";
	$db=new Database();
	if(isset($_POST['submit']))
	{
		$user=$_POST['username'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$db->insertRow(array('user_name'=>$user,'user_email'=>$email,'user_pass'=>$pass),'users');
		$location="form.php";
		header("Location: $location");
		
	}
 
 ?> 