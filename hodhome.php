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
	<link rel="stylesheet" type="text/css" href="button.css">
	<link rel="stylesheet" type="text/css" href="blackboard.css">

	<script type="text/javascript">
		function preventBack() { window.history.forward(); }
		setTimeout("preventBack()", 0);
		window.onunload = function () { null };
	</script>

	<title>HOD page</title>
</head>
<body>
	<div class="shade">
	<ul>
		<li><a href="hodhome.php">Home</a></li>
		<li><a href="hodrequest.php">Pending Requests</a></li>
		<li><a href="hodhistory.php">History</a></li>
		<li><a href="hodspecialrequestview.php">Special Requests</a></li>
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