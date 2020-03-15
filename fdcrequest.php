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
	<title>HOD REQUEST</title>
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
	<label>Pending Requests</label>
</p>
<table border = "1 solid black">
	<tr>
		<td>Faculty Name</td>
		<td>Branch</td>
		<td>Mail id</td>
		<td>Start date</td>
		<td>Number of ODs</td>
		<td>Amount</td>
		<td>Reason</td>
		<td>Comment</td>
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

			$sql = "Select * from fdc_leave_data where Branch = '$_SESSION[branch]' and FDCM_Remark = '' and HOD_Remark != ''";
			$result = $conn->query($sql);
			if($result->num_rows>0)
			{
				while($row = $result->fetch_assoc())
				{
					$temp1 = $row['Faculty_Mailid']; 
					$temp2 = $row['Start_Date'];
					$temp = $temp1.",".$temp2; 
					echo "<tr><td>".$row['Faculty_Name']."</td>".
					"<td>".$row['Branch']."</td>".
					"<td>".$row['Faculty_Mailid']."</td>".
					"<td>".$row['Start_Date']."</td>".
					"<td>".$row['Number_of_ODs']."</td>".
					"<td>".$row['Amount']."</td>".
					"<td>".$row['Reason']."</td>".
					//"<td>ndxhjbfd</td></tr>";
					'<td><a href = "fdccomment.php?id='.$temp.'">Edit</a></td></tr>';
				}
			}


		}
	?>
</table>
</body>
</html>