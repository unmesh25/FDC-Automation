<!DOCTYPE html>
<html>
<head>
		<style type="text/css">
		body{
			background-image: url('laptop.jpg');
			background-repeat: no-repeat;  
			background-size: 1800px 800px;
		}
	</style>
		<link rel="stylesheet" type="text/css" href="button.css">
		<link rel="stylesheet" type="text/css" href="table.css">
		<link rel="stylesheet" type="text/css" href="blackboard.css">
	<title>HOD REQUEST</title>
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
	<p style="text-align: center;font-size: 1.5em;">
	<label>Special Requests</label>
</p>
<table border = "1 solid black">
	<tr>
		<td>Faculty Name</td>
		<td>Branch</td>
		<td>Mail id</td>
		<td>Number of Days</td>
		<td>Amount Claimed</td>
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

			$sql = "Select a.*, b.Admin_Mail from fdc_leave_data a left join admin_sanction_data b on a.Start_date=b.Start_date where a.Special_Request = 'Yes' and b.Admin_Mail = ''";
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
					"<td>".$row['Number_of_ODs']."</td>".
					"<td>".$row['Amount']."</td>".
					"<td>".$row['Reason']."</td>".
					//"<td>ndxhjbfd</td></tr>";
					'<td><a href = "fdcadmincomment.php?id='.$temp.'">Edit</a></td></tr>';
				}
			}


		}
	?>
</table>
</body>
</html>