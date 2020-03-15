<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="blackboard.css">
		<link rel="stylesheet" type="text/css" href="button.css">
	<style type="text/css">

		.myform{
			color: white;
			font-size: 15px;
			padding: 70px 20px 20px;
		}

		textarea {
		height:100px;
		font-size: 1.5em;
		line-height: 1em;
		resize: none;
}


		.blackboard:before {
		box-sizing: border-box;
		display: block;
		position: absolute;
		width: 100%;
		height: 100%;
		background-image: linear-gradient( 175deg, transparent, transparent 40px, rgba(120, 120, 120, 0.1) 100px, rgba(120, 120, 120, 0.1) 110px, transparent 220px, transparent), linear-gradient( 200deg, transparent 80%, rgba(50, 50, 50, 0.3)), radial-gradient( ellipse at right bottom, transparent, transparent 200px, rgba(80, 80, 80, 0.1) 260px, rgba(80, 80, 80, 0.1) 320px, transparent 400px, transparent);
		border: #2c2c2c solid 2px;
		content: "Leave Review";
		font-family: 'Permanent Marker', cursive;
		font-size: 2.2em;
		color: rgba(0,200,200,0.7);
		text-align: center;
		padding-top: 20px;
}
body{
			background-image: url('laptop.jpg');
			background-repeat: no-repeat;  
			background-size: 1500px 800px;
		}

		select{
	height:2em;
}

	.amount{
		width: 6em;
	}

	.ods{
		width: 3em;
	}

	input[type="date"]{
		width: 8.5em;
	}
</style>
	<title>Comment of fdc</title>
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
		<div class="form">
<form action = fdcadmincomment2.php method = 'POST' class="myform">
<?php
session_start();
$temp = $_GET['id'];
$arr = explode(",", $temp);
$_SESSION['facultymail'] = $facultymail = $arr[0];
$_SESSION['startdate'] = $startdate = $arr[1];
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$localhost = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'fdc';

	$conn = mysqli_connect($localhost, $username, $password, $db);
	if($conn)
	{
		//echo "Connection sucessful";
	}
	else
	{
		echo "Error".mysqli_connect_error();
	}


	$sql = "Select a.*,b.HOD_name,b.HOD_email,b.HOD_Remark,b.HOD_Remark_Reason from application_data a left join fdc_leave_data b on a.Email = b.Faculty_Mailid Where b.Faculty_Mailid='$facultymail' and a.Start_date = '$startdate' and b.Start_Date = '$startdate' and a.Special_Request = 'Yes' and b.Special_Request = 'Yes'";
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "<p><label>Name: ".$row['Name'].
					"</label>

						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".

					"<label>Branch: ".$row['Branch'].
						"</label>
					</p>".
					"<p><label>Email id: ".$row['Email'].
						"</label>
					</p>".
					"<p><label>Type of Program: ".$row['Type'].
						"</label>
					</p>".					
					"<p><label>Title: ".$row['Title'].
						"</label>
					</p>".
					"<p><label>Name of Organization: ".$row['Name_of_Organization'].
						"</label>
					</p>".
					"<p><label>Address of Organization: ".$row['Address_of_organization'].
						"</label>
					</p>".
					"<p><label>Other Organizations: ".$row['Other_Organizations'].
						"</label>
					</p>".
					"<p><label>Special Request: ".$row['Special_Request'].
						"</label>
					</p>".					
					"<p><label>Training Start Date: ".$row['Start_date'].
						"</label>
					</p>".
					"<p><label>Training End Date:".$row['End_date'].
						"</label>
					</p>".
					"<p><label>Number of ODs claimed: ".$row['Total_no_of_ods'].
						"</label>
					</p>".
					"<p><label>Last date of Registration: ".$row['Last_date_for_registration'].
						"</label>
					</p>".
					"<p><label>Period: ".$row['Period'].
						"</label>
					</p>".
					"<p><label>Registration fee: ".$row['Registration_fee'].
						"</label>
					</p>".
					"<p><label>Period: ".$row['Period'].
						"</label>
					</p>".
					"<p><label>Amount Claimed: ".$row['Amount_claimed'].
						"</label>
					</p>".
					"<p><label>Reason: ".$row['Purpose'].
						"</label>
					</p>";

			echo "<br>";

			echo "<p><label>Remark: </label>
						<select name = 'remark' required>
							<option value=''></option>
							<option>Accepted</option>
							<option>Rejected</option>
						</select>
				</p>";
			echo "<p><label>Reason for Remark:</label>
							<textarea rows = '4' cols = '50' name = 'remark_reason' maxlength = '400' required>
							</textarea>
				</p>";
			echo "<p><label>Date: </label>
						<input type = 'date' name = 'date_of_meeting' required>
				</p>";
			echo "<p><label>Amount Sanctioned:</label>
						<input type = 'number' name = 'amount_sanctioned' class='amount' required>
				</p>";
			echo "<p><label>ODs Sanctioned:</label>
						<input type = 'number' name = 'ods_sanctioned' class='ods' required>
				</p>";
		}
	}

}
?>
<br>
<p class="wipeout">
<input type= "submit" value = "submit">
</p>
</form>
</body>
</html>