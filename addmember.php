<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="button.css">
	<style type="text/css">
		.myform{
			color: white;
			font-size: 15px;
			padding: 70px 20px 20px;
		}



		.blackboard:before {
			box-sizing: border-box;
			display: block;
			position: absolute;
			width: 100%;
			height: 100%;
			background-image: linear-gradient( 175deg, transparent, transparent 40px, rgba(120, 120, 120, 0.1) 100px, rgba(120, 120, 120, 0.1) 110px, transparent 220px, transparent), linear-gradient( 200deg, transparent 80%, rgba(50, 50, 50, 0.3)), radial-gradient( ellipse at right bottom, transparent, transparent 200px, rgba(80, 80, 80, 0.1) 260px, rgba(80, 80, 80, 0.1) 320px, transparent 400px, transparent);
			border: #2c2c2c solid 2px;
			content: "Add Member";
			font-family: 'Segoe UI', cursive;
			font-size: 2.2em;
			color: rgba(0,200,200,0.7);
			text-align: center;
			padding-top: 20px;
		}

		input[type="radio"]{
			width: 0.7em;
			height:1.1em;
		}

		body{
			background-image: url('laptop.jpg');
			background-repeat: no-repeat;  
			background-size: cover;
		}

		label {
		vertical-align: middle;
		font-family: 'Segoe UI', cursive;
		font-size: 1.6em;
		color: rgba(238, 238, 238, 0.7);
}


input,
textarea {
		vertical-align: middle;
		padding-left: 10px;
		background: none;
		border: none;
		font-family: 'Segoe UI', cursive;
		font-size: 1.6em;
		color: red;
		line-height: .6em;
		outline: none;
}

input[type="submit"] {
		cursor: pointer;
		color: rgba(238, 238, 238, 0.7);
		line-height: 1em;
		padding: 0;
		border: none;
}

input[type="submit"]:focus {
		background: rgba(238, 238, 238, 0.2);
		color: rgba(238, 238, 238, 0.2);
		border: none;
}

input{
	position: relative;
	border-bottom: #c9ad86 solid 1px;
}
	</style>

	<link rel="stylesheet" type="text/css" href="blackboard.css">
	<title>Add member</title>
</head>
<body>
	<div class="shade">
	<ul>
		<li><a href="fdcadminhome.php">Home</a></li>
		<li><a href="addmember.php">Add Member</a></li>
		<li><a href="deletemember.php">Delete Member</a></li>
		<li><a href="specialrequest.php">Special Request</a></li>
		<li><a href="fdcadminhistory.php">History</a></li>
		<li style="float:right"><a class="active" href="logout.php">Logout</a></li>
	</ul>
	<div class="blackboard">
		<div class="form">
			<form action="add.php" method="post" class="myform">
				<p>
					<label>Member Name: </label>
					<input type="text" name="mname" required>
				</p>
				<p>
					<label>Member Email: </label>
					<input type="text" name="memail" required>
				</p>
				<p>
					<label>Member Type: </label><br>
					<input type = "radio" name = "mtype" value = "Faculty">Faculty
					<br>
					<input type = "radio" name = "mtype" value = "HOD">HOD
					<br>
					<input type = "radio" name = "mtype" value = "FDC Member">FDC Member
					<br>
					<input type = "radio" name = "mtype" value = "FDC Admin">FDC Admin
				</p>
				<p>
					<label>Password: </label>
					<input type="password" name="mpassword" required>
				</p>
				<p class="wipeout">
					<input type="submit" value="Submit" />
				</p>

			</form>
		</div>
	</div>
</div>
</body>
</html>