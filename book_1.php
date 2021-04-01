<?php
SESSION_START();
header('location:book.html');
$con = mysqli_connect("localhost","root","");
if(!$con)
{
die("connection failed: ".mysqli_connect_error());
}
 echo "Connected Successfully";

mysqli_select_db($con, 'web');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$adult = $_POST['adult'];
$child = $_POST['child'];
$tour_no = $_POST['tour_no'];
$tour_name = $_POST['tour_name'];
$room = $_POST['room'];

$qy="insert into book_1 (first_name, last_name, adult, child, tour_no, tour_name, room) values('$first_name','$last_name','$adult','$child','$tour_no','$tour_name','$room')";
$result=mysqli_query($con , $qy);

if(!$result){
	echo"Not Inserted";
}
else{
	echo"Inserted";
}

?>