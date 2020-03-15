<?php include 'header.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Login html page</title>
	<link rel="stylesheet" type="text/css" href="logincss.css">
	<link rel="stylesheet" type="text/css" href="background.css">

	<style type="text/css">
		body{
			background-image: url('laptop.jpg');
			background-repeat: no-repeat;  
			background-size: 1800px 800px;
		}
	</style>
</head>
<body>
	<div class="login-box" style="margin-top: 200px">
		<h1>Login</h1>
			<form action = "login.php" method = "POST" name="myform">
				<div class="textbox">
	
					<input type = "text" name = "mail" placeholder="Email" autofocus required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
   				</div>
			<br>
				<div class="textbox">
					<input type = "password" name = "password" placeholder="Password" required>
			<br>
				</div>
					<input class="btn" type = "submit" value = "submit" onclick="validation()">

		</form>
</div>


</body>
</html>