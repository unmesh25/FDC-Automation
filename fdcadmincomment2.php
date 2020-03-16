<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<link rel="stylesheet" type="text/css" href="logoutcss.css">
	<style type="text/css">
		.item{
			margin-left: 300px;
		}
	</style>
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
	$specialods = 0;
	$specialamount = 0;
	$sql1 = "Select * from resource_data Where Email = '$mid'";
	$result1 = $conn->query($sql1);
	if($result1->num_rows>0)
	{
		while($row1 = $result1->fetch_assoc())
		{
			$specialods = $row1['Special_Ods'];
			$specialamount = $row1['Special_Amount'];
		}
	}
	$sql3 = "Select * from application_data Where Email = '$mid' and Special_Request = 'Yes'";
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
				//echo $row3['Total_no_of_ods'];
				//echo $row3['Amount_claimed'];
				
			}
		}
	}
	else
	{
		echo "Error";
	}

	if($flag1 == 0 && $flag2 == 0)
	{
		$sql = "Update admin_sanction_data Set Admin_Mail = '$_SESSION[mail]', Remark = '$remark', Reason = '$remark_reason', Sanctioned_Amount = '$amount_sanctioned', Sanctioned_Ods = '$ods_sanctioned' Where Faculty_Mail = '$mid' and Start_date = '$startdate'";
		$result = $conn->query($sql);
		if($result)
		{
			//echo "done";
			/*header("Location: fdchome.php");*/
		}
		else
		{
			echo "select not working";
		}

		if($remark == 'Accepted')
		{
			$sql = "Update resource_data Set Special_Ods = '$specialods' + '$ods_sanctioned', Special_Amount = Special_Amount + '$amount_sanctioned' where Email = '$mid'";
			$result = $conn->query($sql);


			


		}
		else if($remark == 'Rejected')
		{

			

		}
		if($result)
		{
			header("Location: fdcadminhome.php");
		}
		else
		{
			echo "update not working";
		}
	}
	
	else
	{
		header("Location: invalidcomment.php");
	}
}
else
{
	echo "error";
}
?>
</body>
</html>

