<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="blackboard.css">
	<link rel="stylesheet" type="text/css" href="button.css">
	<style type="text/css">

		textarea {
			height:100px;
			font-size: 0.7em;
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

		.myform{
			color: white;
			font-size: 15px;
			padding: 70px 20px 20px;
		}
	</style>
	<title>Comment</title>
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
			<div class="form">
				<form action = hodcomment2.php method = 'POST' class="myform">
					<?php
					session_start();
					//$_SESSION['facultymail'] = $facultymail = $_GET['id'];
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
						/*if($conn)
						{
							//echo "Connection sucessful";
						}
						else
						{
							echo "Error".mysqli_connect_error();
						}
						*/
						$dbh = new PDO("mysql:host=localhost;dbname=fdc","root","");

						$sql = "Select * from application_data WHERE Email = '$facultymail' and Start_date = '$startdate'";
						$result = $conn->query($sql);
						if($result->num_rows>0)
						{
							while($row = $result->fetch_assoc())
							{
								echo"<p>
										<label>Name: ".$row['Name'].
										"</label>
									</p>".
									"<p>
										<label>Branch: ".$row['Branch'].
										"</label>
									</p>".
									"<p>
										<label>Email id: ".$row['Email'].
										"</lable>
									</p>".
									"<p>
										<label>Type of Program: ".$row['Type'].
										"</label>
									</p>".
									"<p>
										<label>Title: ".$row['Title'].
										"</label>
									</p>".
									"<p>
										<label>Name of Organization: ".$row['Name_of_Organization'].
										"</label>
									</p>".
									"<p>
										<label>Address of Organization: ".$row['Address_of_organization'].
										"</label>
									</p>".
									"<p>
										<label>Other Organizations: ".$row['Other_Organizations'].
										"</label>
									</p>".
									"<p>
										<label>Special Request: ".$row['Special_Request'].
										"</label>
									</p>".					
									"<p>
										<label>Training Start Date: ".$row['Start_date'].
										"</label>
									</p>".
									"<p>
										<label>Training End Date:".$row['End_date'].
										"</label>
									</p>".
									"<p>
										<label>Number of Days: ".$row['Total_no_of_ods'].
										"</label>
									</p>".
									"<p>
										<label>Last date of Registration: ".$row['Last_date_for_registration'].
										"</label>
									</p>".
									"<p>
										<label>Period: ".$row['Period'].
										"</label>
									</p>".
									"<p>
										<label>Registration fee: ".$row['Registration_fee'].
										"</label>
									</p>".
									"<p>
										<label>Period: ".$row['Period'].
										"</label>
									</p>".
									"<p>
										<label>Amount Claimed: ".$row['Amount_claimed'].
										"</label>
									</p>".
									"<p>
										<label>Reason: ".$row['Purpose'].
										"</label>
									</p>";


								$stat = $dbh->prepare("Select * from leave_data_files where Email = '$facultymail'");
								$stat->execute();
								while($roww = $stat->fetch())
								{
									echo"<p>
											<a target = '_blank' href = 'viewfile.php?id=".$roww['Email']."'>".$roww['file_name']."</a>
										</p>";
								}

								echo "<p>
										<label>Remark:
										</label>
										<select name = 'remark'>
											<option>Recommended</option>
											<option>Not Recommended</option>
										</select>
									</p>";
								echo "<p>
										<label>Reason for Remark:
										<label>
										<textarea rows = '4' cols = '40' name = 'remarkreason' maxlength = '400'>
										</textarea>
									</p>";
		}
	}

}
?>
					<p class="wipeout">
						<input type= "submit" value = "submit">
					</p>
				</form>
</body>
</html>