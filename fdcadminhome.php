<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="blackboard.css">
	<link rel="stylesheet" type="text/css" href="button.css">
	<style type="text/css">
			body{
			background-image: url('laptop.jpg');
			background-repeat: no-repeat;  
			background-size: cover;
		}

	</style>
	<script type="text/javascript">
		function preventBack() { window.history.forward(); }
		setTimeout("preventBack()", 0);
		window.onunload = function () { null };
	</script>

	


	<title>FDC admin homepage</title>
</head>
<body>
	<div class="shade">
	<ul>
		<li><a href="fdcadminhome.php">Home</a></li>
		<li><a href="addmember.php">Add Member</a></li>
		<li><a href="deletemember.php">Delete Member</a></li>
		<li><a href="specialrequest.php">Special Request</a></li>
		<li><a href="fdcadminhistory.php">History</a></li>
		<li style="float:right;"><a class="active" href="logout.php" onclick="preventBack()">Logout</a></li>
	</ul>


	<div class="blackboard">
		<p style="text-align: center;">
			<label>Welcome <?php echo $_SESSION['name'];?>
		</label>
	</p>
</div>
</div>
</body>
</html>