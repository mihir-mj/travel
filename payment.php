<?php
SESSION_START();
header('location:thankyou.html');
$con = mysqli_connect("localhost","root","");
if(!$con)
{
die("connection failed: ".mysqli_connect_error());
}
 echo "Connected Successfully";

mysqli_select_db($con, 'web');

$cc_no= $_POST['cc_no'];
$month= $_POST['month'];
$year= $_POST['year'];
$code= $_POST['code'];

$qy="insert into payment (cc_no, month, year, code) values('$cc_no','$month','$year','$code')";
$result=mysqli_query($con , $qy);

if(!$result){
	echo"Not Inserted";
}
else{
	echo"Inserted";
}
?>