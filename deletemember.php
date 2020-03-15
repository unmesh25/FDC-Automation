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
	<title>Delete</title>
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
	<label>Delete Member</label>
</p>
<table border = "1 solid black">
<tr>
<td>Name</td>
<td>Mail</td>
<td>Branch</td>
<td>Member Type</td>
<td>Delete</td>
</tr>
<?php
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

	$sql = "Select * from faculty";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$temp = $row['Email'];
			if($row['MemberType'] != 'FDC Admin')
			{
			echo "<tr><td>".$row['Name']."</td>".
			"<td>".$row['Email']."</td>".
			"<td>".$row['Branch']."</td>".
			"<td>".$row['MemberType']."</td>".
			'<td><a href = "fdcdelete.php?id='.$temp.'">Delete</a></td></tr>';
			}
		}
	}
}
?>
</table>
</table>
</body>
</html>