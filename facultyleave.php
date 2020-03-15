<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="blackboard.css">
	<link rel="stylesheet" type="text/css" href="button.css">
	<style type="text/css">

		.blackboard:before {
			box-sizing: border-box;
			display: block;
			position: absolute;
			width: 100%;
			height: 100%;
			background-image: linear-gradient( 175deg, transparent, transparent 40px, rgba(120, 120, 120, 0.1) 100px, rgba(120, 120, 120, 0.1) 110px, transparent 220px, transparent), linear-gradient( 200deg, transparent 80%, rgba(50, 50, 50, 0.3)), radial-gradient( ellipse at right bottom, transparent, transparent 200px, rgba(80, 80, 80, 0.1) 260px, rgba(80, 80, 80, 0.1) 320px, transparent 400px, transparent);
			border: #2c2c2c solid 2px;
			font-family: 'Permanent Marker', cursive;
			font-size: 2.2em;
			content: "Leave Application";
			color: rgba(238, 238, 238, 0.7);
			text-align: center;
			padding-top: 20px;
		}

		input[type="radio"]{
			width: 0.7em;
			height:1.1em;
		}

		input[type="number"]{
			width: 6em;
		}

		input[type="date"]{
			width: 9em;
		}

		select{
			height:2em;
		}

		body{
			background-image: url('laptop.jpg');
			background-repeat: no-repeat;  
			background-size: cover;
		}

		.myform{
			color: white;
			font-size: 15px;
			padding: 70px 20px 20px;
		}
	</style>
	<title>Leave Details</title>
</head>
<body>
	<div class="shade">
		<ul>
		<li><a href="facultyhome.php">Home</a></li>
		<li><a href="facultyleave.php">Apply For Training Program</a></li>
		<li><a href="status.php">Status</a></li>
		<li><a href="facultyspecialrequeststatus.php">Special Request Status</a></li>
		<li style="float:right"><a class="active" href="logout.php">Logout</a></li>
	</ul>
		<div class="blackboard">
			<div class="form">
				<form action = "facultyleave.php" method = "POST" enctype = "multipart/form-data" class="myform">
					<center><p>
						<label>Name:
							<?php 
							echo $_SESSION['name'];
							?></label>
						</p>
						<p>
							<label>Email ID:
								<?php 
								echo $_SESSION['mail'];
								?></label>
							</p>
							<p>
								<label>Branch: 
									<?php 
									echo $_SESSION['branch'];?></label>
								</p>
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
		//echo "Connection sucessful";
	}
	else
	{
		echo "Error".mysqli_connect_error();
	}
*/
	$sql = "Select * from resource_data where Email = '$_SESSION[mail]'";
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "<p>
			<label>Number of Ods claimable: ".$row['ODs']."</label>
			</p>";
			echo "<p>
			<label>Amount claimable: ".$row['Amount']."</label>
			</p>";
		}
	}
}
?>
</center>
<p>
	<label>Training Program:</label>
	<select required name = "type">
		<option value=""></option>
		<option>STTP</option>
		<option>Symposium</option>
		<option>Workshop</option>
		<option>Conference</option>
		<option>Seminar</option>
	</select>
</p>
<p>
	<label>Title:</label>
	<input type = "text" name = "title"  required>
</p>
<p>
	<label>Name of Organization:</label>
	<input type = "text" name = "name_organization" required>
</p>
<p>
	<label>Address of Organization:</label>
	<input type = "text" name = "address_organization" required>
</p>
<p>
	<label>Other Organizations:</label>
	<input type = "text" name = "other_organization" >
</p>
<p>
	<label>Special Request:</label>
	<input type = "radio" name = "srequest" value = "Yes" required >Yes
	<input type = "radio" name = "srequest" value = "No" >No
</p>
<p>
	<label>Training Start Date:</label>
	<input type = "date" name = "startdate" required>
</p>
<p>
	<label>Training End Date:</label>
	<input type = "date" name = "enddate" required>
</p>
<p>
	<label>Last date of registration:</label>
	<input type = "date" name = "lastdate" required>
</p>
<p>
	<label>Period:</label>
	<select name = "period"  required>
		<option value=""></option>
		<option>Non Vaction Period</option>
		<option>Vacation Period</option>
	</select>
</p>
<p>
	<label>Registration Fee:</label>
	<input type = "number" name = "fee"  required>
</p>
<p>
	<label>Amount Claimed:</label>
	<input type = "number" name = "amount" required>
</p>
<p>
	<label>Purpose:</label>
	<textarea rows = "3" cols = "25" name = "reason" maxlength = "400" required>
	</textarea>
</p>

<p class="wipeout">
	<input type="submit" value="Submit" name = "btn"/>
</p>
</form>
</div>
</div>
</div>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	$type = $_POST['type'];
	$title = $_POST['title'];
	$name_organization = $_POST['name_organization'];
	$address_organization = $_POST['address_organization'];
	$other_organization = $_POST['other_organization'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	//$ods = $_POST['ods'];
	$lastdate = $_POST['lastdate'];
	$period = $_POST['period'];
	$fee = $_POST['fee'];
	$amount = $_POST['amount'];
	$reason = $_POST['reason'];

	if(isset($_POST['srequest']))
	{
		$srequest = $_POST['srequest'];
	}

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

	

	$date1 = new DateTime($startdate);
	$date2 = new DateTime($enddate);
	$interval = $date1->diff($date2);
	$ods = $interval->days;	
	$flag = 0;

	$sqls = "Select Start_date from application_data where Email = '$_SESSION[mail]'";
	$results = $conn->query($sqls);
	if($results->num_rows>0)
	{
		while($rows = $results->fetch_assoc())
		{
			if($rows['Start_date'] == $startdate)
			{
				$flag = 1;
				break;			
			}
			else
			{}
		}
	}

	if($flag == 0)
	{
		$sql = "Insert into leave_data(Branch,Name,Email,Start_date,Number_of_ODs,Amount,Reason) values ('$_SESSION[branch]','$_SESSION[name]','$_SESSION[mail]','$startdate','$ods','$amount','$reason')";
		$result = $conn->query($sql);
		
		if($result)
		{
			header("Location: leavemessage.php");
			//header("Location: facultyhome.html");
		}
		else
		{
			header("Location: leavemessage1.php");
		}




		$sql2 = "Insert into fdc_leave_data(Branch,Faculty_Name,Faculty_Mailid,Start_date,Number_of_ODs,Amount,Reason,Special_Request) values ('$_SESSION[branch]','$_SESSION[name]','$_SESSION[mail]','$startdate','$ods','$amount','$reason','$srequest')";
		$result2 = $conn->query($sql2);

		/*if($result2)
		{
			echo "data inserted";
			//header("Location: facultyhome.html");
		}
		else
		{
			echo "data not inserted in fdc leave ";
		}*/



		$sql3 = "Insert into application_data(Name,Email,Branch,Type,Title,Name_of_Organization,Address_of_Organization,Other_Organizations,Start_date,End_date,Total_no_of_ods,Last_date_for_registration,Period,Registration_fee,Amount_claimed,Purpose,Special_Request) values ('$_SESSION[name]','$_SESSION[mail]','$_SESSION[branch]','$type','$title','$name_organization','$address_organization','$other_organization','$startdate','$enddate','$ods','$lastdate','$period','$fee','$amount','$reason','$srequest')";
		$result3 = $conn->query($sql3);

		/*if($result3)
		{
			echo "data inserted";
			//header("Location: facultyhome.html");
		}
		else
		{
			echo "data not inserted in application ";
		}*/



		$sql4 = "Insert into fdc_sanction_data(Faculty_Name,Faculty_Mail,Start_date,Branch,Special_Request) values ('$_SESSION[name]','$_SESSION[mail]','$startdate','$_SESSION[branch]','$srequest')";
		$result4 = $conn->query($sql4);
		
		/*if($result4)
		{
			echo "data inserted";
			//header("Location: facultyhome.html");
		}
		else
		{
			echo "data not inserted in sanction";
		}*/



		if($srequest == 'Yes')
		{
			$sql5 = "Insert into admin_sanction_data(Faculty_name, Faculty_Mail, Special_Ods, Special_Amount, Title, Start_date) values ('$_SESSION[name]','$_SESSION[mail]', '$ods', '$amount', '$title', '$startdate')";
			$result5 = $conn->query($sql5);

			/*if($result5)
			{
				echo "data inserted";
				//header("Location: facultyhome.html");
			}
			else
			{
				echo "data not inserted in sanction";
			}*/
		}
		
		
	}
	else
	{
		header("Location: leavemessage1.php");
	}
}
?>
</body>
</html>