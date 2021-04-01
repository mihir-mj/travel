<?php
SESSION_START();
$con = mysqli_connect("localhost","root","");

if(!$con)
{
die("connection failed: ".mysqli_connect_error());
} 
echo "Connected Successfully";
mysqli_select_db($con,'web');

$firstname = $_POST['firstname'];
$email = $_POST['email'];
$password = $_POST['password'];

$q="select * from signup where email='$email' && password='$password' ";
$result = mysqli_query($con, $q);
$num= mysqli_num_rows($result);
if($num==1)
{
	$_SESSION['firstname']=$firstname;
	if($firstname == "admin" && $email == "admin@gmail.com"){
		header('location:admin.php');
	}
	else{
		header('location:user.php');
    	}
} 
else
{
header('location:login.html');
}
?>