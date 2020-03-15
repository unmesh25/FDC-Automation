<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
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
	<link rel="stylesheet" type="text/css" href="button.css">
	<link rel="stylesheet" type="text/css" href="blackboard.css">
	<title>Faculty Homepage</title>
	
</head>
<body>
	<div class="shade">
	<ul>
		<li><a href="facultyhome.php">Home</a></li>
		<li><a href="facultyleave.php">Apply For Training Program</a></li>
		<li><a href="status.php">Status</a></li>
		<li><a href="facultyspecialrequeststatus.php">Special Request Status</a></li>
		<li style="float:right"><a class="active" href="logout.php" onclick="preventBack()">Logout</a></li>
	</ul>
		<div class="blackboard">
			<p style="text-align: center;">
				<label>Welcome <?php echo $_SESSION['name'];?>
				</label>
			</p>
	</div>

</body>
</html>