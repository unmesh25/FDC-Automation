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
	<link rel="stylesheet" type="text/css" href="table.css">
	<link rel="stylesheet" type="text/css" href="blackboard.css">
	<title>Special Request Status</title>
	
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
	<p style="text-align: center;  font-size: 20px;">
	<label>Special Request Status</label>
</p>
	<table border = "1 solid black">
		<tr>
			<td>Title</td>
			<td>Start Date</td>
			<td>End date</td>
			<td>ODs Claimed</td>
			<td>Amount Claimed</td>
			<td>Reason</td>
			<td>Admin Comment</td>
			<td>ODs Granted</td>
			<td>Amount Granted</td>
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
			$facultymail = $_SESSION['mail'];
			$sql = "Select a.*,b.* from application_data a left join admin_sanction_data b on a.Start_date = b.Start_Date Where b.Faculty_Mail='$facultymail' and a.Email = '$facultymail' and a.Special_Request = 'Yes'";
			$result = $conn->query($sql);
			if($result->num_rows>0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<tr><td>".$row['Title']."</td>".
					"<td>".$row['Start_date']."</td>".
					"<td>".$row['End_date']."</td>".
					"<td>".$row['Total_no_of_ods']."</td>".
					"<td>".$row['Amount_claimed']."</td>".
					"<td>".$row['Purpose']."</td>".
					"<td>".$row['Remark']."</td>".
					"<td>".$row['Sanctioned_Ods']."</td>".
					"<td>".$row['Sanctioned_Amount']."</td></tr>";
					//"<td>ndxhjbfd</td></tr>";
					//'<td><a href = "status2.php?id='.$temp.'">View</a></td></tr>';
				
				}
			}

		}
		?>
</div>
</body>
</html>