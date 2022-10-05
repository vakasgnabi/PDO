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
 
 <body>
 
	<div id="form">
	<form action="insert.php" method="POST">
		<label>User Name:</label>
		<input type="text" name="username" placeholder="enter user name" required="required"/>
		<label>User Email:</label>
		<input type="email" name="email" placeholder="enter email " required="required"/>
		<label>Password:</label>
		<input type="password" name="pass" placeholder="enter password" required="required"/>
		<input type="submit" name="submit" value="submit">
	</form>
	
	</div>
 
 
 
 </body>
 
 
 </html>
 
 