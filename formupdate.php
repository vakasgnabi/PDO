 <!DOCTYPE html>
 
 
 <html>
	<head>
		<title>Registration Form</title>
		<style type="text/css">
		body{
			padding:0;
			margin:0;
			background:silver;
		
		}
		
		
		#form{
			width:50%;
			height:400px;
			margin:0 auto;
			padding:20px;
			background:white;
			
		}
		input{
			width:400px;
			display:block;
			margin:5px;
			height:30px;
		}
		label{
			margin:5px;
			font-weight:bold;
		}
		</style>
	</head>
 <?php 
 
 include "Database.php";
 $db=new Database();
 $getRow=$db->getRow(['user_name','user_email','user_pass','id'],"users",['id'=>4]);
 
 
 
 
 ?>
 <body>
 
	<div id="form">
	<form action="update.php" method="POST">
		<label>User Name:</label>
		<input type="text" name="username" value="<?=$getRow['user_name']?>" placeholder="enter user name" required="required"/>
		<input type="hidden" name="id" value="<?=$getRow['id']?>">
		<label>User Email:</label>
		<input type="email" name="email" value="<?=$getRow['user_email']?>" placeholder="enter email " required="required"/>
		<label>Password:</label>
		<input type="password" name="pass" value="<?=$getRow['user_pass']?>" placeholder="enter password" required="required"/>
		<input type="submit" name="submit" value="submit">
	</form>
	
	</div>
 
 
 
 </body>
 
 
 </html>
 
 