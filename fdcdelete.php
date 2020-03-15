<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="blackboard.css">
	<link rel="stylesheet" type="text/css" href="button.css">
	<title>Deletion</title>
</head>
<body>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$localhost = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'fdc';

	$mail = $_GET['id'];

	$conn = mysqli_connect($localhost, $username, $password, $db);
	if($conn)
	{
		//echo "Connection sucessful";
		header("Location: deletemember.php");
	}
	else
	{
		//echo "Error".mysqli_connect_error();
	}

	$sql = "Delete From application_data Where Email = '$mail'";
	$result = $conn->query($sql);
	if($result)
	{}
	else
	{
		//echo "1";
	}

	$sql = "Delete From faculty Where Email = '$mail'";
	$result = $conn->query($sql);
	if($result)
	{}
	else
	{
		//echo "2";
	}

	$sql = "Delete From fdc_leave_data Where Faculty_Mailid = '$mail'";
	$result = $conn->query($sql);
	if($result)
	{}
	else
	{
		//echo "3";
	}

	$sql = "Delete From fdc_sanction_data Where Faculty_Mail = '$mail'";
	$result = $conn->query($sql);
	if($result)
	{}
	else
	{
		//echo "4";
	}

	$sql = "Delete From leave_data Where Email = '$mail'";
	$result = $conn->query($sql);
	if($result)
	{}
	else
	{
		//echo "5";
	}

	$sql = "Delete From leave_data_Files Where Email = '$mail'";
	$result = $conn->query($sql);
	if($result)
	{}
	else
	{
		//echo "6";
	}

	$sql = "Delete From resource_data Where Email = '$mail'";
	$result = $conn->query($sql);
	if($result)
	{}
	else
	{
		//echo "7";
	}

}
?>
</body>
</html>