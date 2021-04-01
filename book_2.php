<?php
SESSION_START();
header('location:pay.html');
$con = mysqli_connect("localhost","root","");
if(!$con)
{
die("connection failed: ".mysqli_connect_error());
} echo "
Connected Successfully";

mysqli_select_db($con, 'web');

$email = $_POST['email'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];

$qy="insert into book_2 (email, mobile, country, state, city,pincode) values('$email','$mobile','$country','$state','$city','$pincode')";
$result=mysqli_query($con , $qy);

if(!$result){
	echo"Not Inserted";
}
else{
	
}

?>