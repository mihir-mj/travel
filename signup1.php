<?php
SESSION_START();
header('location:login.html');
$con = mysqli_connect("localhost","root","");
if(!$con)
{
die("connection failed: ".mysqli_connect_error());
} echo "
Connected Successfully";

mysqli_select_db($con, 'web');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confpassword = $_POST['confpassword'];
$country = $_POST['country'];
$state = $_POST['state'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];


$q="select * from signup where firstname='$firstname' && email='$email' ";
$result = mysqli_query($con, $q);
$num= mysqli_num_rows($result);
if($num==1)
echo "Duplicate data ";
else
{
$qy="insert into signup (firstname, lastname, email, password, confpassword, country, state, gender, dob) values('$firstname','$lastname','$email','$password','$confpassword','$country','$state','$gender','$dob')";
mysqli_query($con , $qy);
echo "Registered ";
}
?>