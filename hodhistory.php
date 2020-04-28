<!DOCTYPE html>
<html>
<head>

	
	<title>HOD History</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="img/logo.jpg">


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/btn.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">

	
	<style type="text/css">
		body{
			background-image: url('img/background.jpg');
			background-repeat: no-repeat;  
			background-size: cover;
		}

	</style>
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
	<p style="text-align: center; font-size: 20px;">
	<label>History</label>
</p>
<table border = "1 solid black">
	<tr>
		<td>Faculty Name</td>
		<td>Branch</td>
		<td>Mail id</td>
		<td>Number of ODs</td>
		<td>Amount Claimed</td>
		<td>Reason</td>
		<td>Remark</td>
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
			}
*/
			$sql = "Select * from leave_data where Branch = '$_SESSION[branch]' and HOD_Remark != ''";
			$result = $conn->query($sql);
			if($result->num_rows>0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<tr><td>".$row['Name']."</td>".
					"<td>".$row['Branch']."</td>".
					"<td>".$row['Email']."</td>".
					"<td>".$row['Number_of_ODs']."</td>".
					"<td>".$row['Amount']."</td>".
					"<td>".$row['Reason']."</td>".
					"<td>".$row['HOD_Remark']."</td>".
					"<td>".$row['HOD_Remark_Reason']."</td></tr>";
				}
			}


		}
	?>
</table>
</div>
</body>
</html>