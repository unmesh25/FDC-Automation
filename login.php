<?php
/*
INSERT INTO `faculty`(`Name`, `Email`, `Date_of_Appoinment`, `Employee_Code`, `Number`, `Branch`, `MemberType`, `Password`) VALUES ('Admin', 'admin@gmail.com', '01/01/1999', 'one', '1234567890', 'IT', 'FDC Admin', 'aaa')
*/
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$_SESSION['mail'] = $fmail = $_POST['mail'];
	$_SESSION['pass'] = $fpass = $_POST['password'];
	
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

	$ftype = "";
	$fbranch = "";

	$sql = "Select * from faculty where Email = '$fmail' and Password = '$_SESSION[pass]'";
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			$_SESSION['name'] = $row['Name'];
			if($row['Branch'] == '')
			{
				header("Location: facultydetails.php");
			}

			else
			{
				$_SESSION['name'] = $row['Name'];
				$_SESSION['branch'] = $row['Branch'];
				$ftype = $row['MemberType'];
				if($ftype == "Faculty")
				{
					header("Location: facultyhome.php");
				}
				else if($ftype == "HOD")
				{
					header("Location: hodhome.php");
				}
				else if($ftype == "FDC Member")
				{
					header("Location: fdchome.php");
				}
				else if($ftype == "FDC Admin")
				{
					header("Location: fdcadminhome.php");
				}
			}
		}
	}
	else
	{
		header("Location: error.php");
	}

}
else
{
	header("Location: index.php");
}
?>