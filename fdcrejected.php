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
	<link rel="stylesheet" type="text/css" href="table.css">
	<link rel="stylesheet" type="text/css" href="button.css">
	<link rel="stylesheet" type="text/css" href="blackboard.css">
	<title>FDCM rejected</title>
</head>
<body>
	<div class="shade">
	<ul>
		<li><a href="fdchome.php">Home</a></li>
		<li><a href="fdcrequest.php">Pending Request</a></li>
		<li><a href="fdcaccepted.php">Accepted</a></li>
		<li><a href="fdcrejected.php">Rejected</a></li>
		<li style="float:right"><a class="active" href="logout.php" onclick="preventBack()">Logout</a></li>
	</ul>
	<p style="text-align: center;">
	<label>Rejected</label>
</p>
<table border = "1 solid black">
	<tr>
		<td>Faculty Name</td>
		<td>Branch</td>
		<td>Faculty Mailid</td>
		<td>Date of Meeting</td>
		<td>Remark Reason</td>
	</tr>
	<?php
		session_start();
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{

			$localhost = 'localhost';
			$username = 'root';
			$password = '';
			$db = 'fdc';

			$conn = mysqli_connect($localhost, $username, $password, $db);
			/*if($conn)
			{
				echo "Connection sucessful";
			}
			else
			{
				echo "Error".mysqli_connect_error();
			}*/

			$sql = "Select * from fdc_sanction_data where Branch = '$_SESSION[branch]' and Remark = 'Rejected'";
			$result = $conn->query($sql);
			if($result->num_rows>0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<tr><td>".$row['Faculty_Name']."</td>".
					"<td>".$row['Branch']."</td>".
					"<td>".$row['Faculty_Mail']."</td>".
					"<td>".$row['Date_of_Meeting']."</td>".
					"<td>".$row['Remark_Reason']."</td></tr>";
				}
			}


		}
	?>
</table>
</body>
</html>