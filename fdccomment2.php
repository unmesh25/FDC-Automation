<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<link rel="stylesheet" type="text/css" href="table.css">
	<link rel="stylesheet" type="text/css" href="logoutcss.css">
	<title>Accepted/rejected</title>
</head>
<body>
	<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	require 'vendor/autoload.php';
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		
		$localhost = 'localhost';
		$username = 'root';
		$password = '';
		$db = 'fdc';

		$remark = $_POST['remark'];
		$remark_reason = $_POST['remark_reason'];
		$amount_sanctioned = $_POST['amount_sanctioned'];
		$ods_sanctioned = $_POST['ods_sanctioned'];
		$date_of_meeting = $_POST['date_of_meeting'];

		$conn = mysqli_connect($localhost, $username, $password, $db);
	/*if($conn)
	{
		echo "Connection sucessful";
	}
	else
	{
		echo "Error".mysqli_connect_error();
	}*/

	$mid = $_SESSION['facultymail'];
	$startdate = $_SESSION['startdate'];

	//echo "$remark";
	//$sql = "Insert into leave_data(HOD_name,HOD_email,HOD_Remark) values ('$_SESSION[name]','$_SESSION[mail]',$remark)";
	
	$flag1 = 0;
	$flag2 = 0;

	$sql1 = "Select * from resource_data Where Email = '$mid'";
	$result1 = $conn->query($sql1);
	if($result1->num_rows>0)
	{
		while($row1 = $result1->fetch_assoc())
		{
			if(($row1['ODs'] - $ods_sanctioned >= 0) && ($row1['Amount'] - $amount_sanctioned >= 0) )
			{
				$flag1 = 0;
			}
			else
			{
				$flag1 = 1;
			}
		}
	}

	$sql3 = "Select * from application_data Where Email = '$mid' and Start_Date = '$startdate'";
	$result3 = $conn->query($sql3);
	if($result3->num_rows>0)
	{
		while($row3 = $result3->fetch_assoc())
		{
			if(($row3['Total_no_of_ods'] - $ods_sanctioned >= 0) && ($row3['Amount_claimed'] - $amount_sanctioned >= 0))
			{
				$flag2 = 0;
			}
			else
			{
				$flag2 = 1;
			}
		}
	}
	else
	{
		//echo "Error";
	}

	if($flag1 == 0 && $flag2 == 0)
	{
		$sql = "Update fdc_leave_data Set FDCM_name = '$_SESSION[name]', FDCM_mail = '$_SESSION[mail]', FDCM_Remark = '$remark', FDCM_Remark_Reason = '$remark_reason' Where Faculty_Mailid = '$mid' and Start_Date = '$startdate'";
		$result = $conn->query($sql);
		if($result)
		{
			
		}
		else
		{
			echo "data not inserted";
		}

		$sql = "Update fdc_sanction_data Set FDCM_name = '$_SESSION[name]', FDCM_mail = '$_SESSION[mail]', Remark = '$remark', Remark_Reason = '$remark_reason', Date_of_Meeting = '$date_of_meeting', Amount_Sanctioned = '$amount_sanctioned', ODs_sanctioned = '$ods_sanctioned' Where Faculty_Mail = '$mid' and Start_Date = '$startdate'";
		$result = $conn->query($sql);
		if($result)
		{
			/*header("Location: fdchome.php");*/
		}
		else
		{
			echo "select not working";
		}

		if($remark == 'Accepted')
		{
			$sql = "Update resource_data Set ODs = ODs - '$ods_sanctioned', Amount = Amount - '$amount_sanctioned' where Email = '$mid'";
			$result = $conn->query($sql);

			
		}
		else if($remark == 'Rejected')
		{

			
		}
		if($result)
		{
			header("Location: fdchome.php");
		}
		else
		{
			echo "update not working";
		}
	}
	
	else
	{
		header("Location: ods_error.php");
	}
}
else
{
	echo "error";
}
?>
</body>
</html>

