<!doctype html>
<html>
<head>
	<title> Admin </title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<script src="js/jquery.min.js"></script>
    	<script src="js/jquery-ui.js"></script>
    	<script src="js/bootstrap.min.js"></script>
	<style>
		table.tab {
  		table-layout: fixed;
		}
		.input{
		width:125px;
		}
		.button{
		color:white;
		background-color:#E91E63 ;
		}
	</style>
</head>

<body>


<?php
SESSION_START();
$con = mysqli_connect("localhost","root","");
if(!$con)
{
die("connection failed: ".mysqli_connect_error());
} 
mysqli_select_db($con, 'web');
$q="select * from tour";
$result=mysqli_query($con,$q);
$i=0;
?>


<div class="container">
	<h1 class="h1-responsive font-weight-bold my-5"style="text-align:center">Welcome Admin..!! </h1>
</div>

<div class="container-fluid">
<form method="post" action="">
<table  class="table table-striped table-bordered tab" cellspacing="0">
  <thead>
    <tr>
      <th class="th-sm">Tour No </th>
      <th class="th-sm">Tour Name </th>
      <th class="th-sm">Cost (Rs.) </th>
      <th class="th-sm">Days </th>
      <th class="th-sm">Start Date </th>
      <th class="th-sm">End Date </th>

      <th class="th-sm">Update </th>
      <th class="th-sm">Delete </th>
      <th class="th-sm">Check </th>
    </tr>
  </thead>

<?php
ob_start();

while($abc = mysqli_fetch_array($result))
{
	
echo "<tr>";
echo "<td>";
echo '<input class="input" type="text" value="'.$abc['tour_no'].'"name="tour_no'.$i.'"/>';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" value="'.$abc['tour_name'].'"name="tour_name'.$i.'"/>';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" value="'.$abc['cost'].'"name="cost'.$i.'"/>';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" value="'.$abc['days'].'"name="days'.$i.'"/>';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" value="'.$abc['start_date'].'"name="start_date'.$i.'"/>';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" value="'.$abc['end_date'].'"name="end_date'.$i.'"/>';
echo "</td>";

echo"<td>"; 

echo '<input type="submit" class="button" value="Update" name="update_btn'.$i.'"/>';
if(isset($_POST['update_btn'.$i.'']))
{
	if(isset($_POST['check'.$i.'']))
	{
		$no = $_POST['tour_no'.$i.''];
		$name = $_POST['tour_name'.$i.''];
		$cost = $_POST['cost'.$i.''];
		$days = $_POST['days'.$i.''];
		$start = $_POST['start_date'.$i.''];
		$end = $_POST['end_date'.$i.''];

		$q1="update tour set tour_name='$name',cost='$cost',days='$days',start_date='$start' ,end_date='$end' where tour_no='$no'";
		$result1=mysqli_query($con,$q1);

		if($result1){
			header("location:admin.php");
			ob_end_flush();
			die();
		}
		else{
			echo"Delete Failed";
		}	
	}

	else 
		echo"Please select Checkbox";
}
echo"</td>";

echo"<td>";
echo '<input type="submit" class="button" value="Delete" name="delete_btn'.$i.'"/>';
if(isset($_POST['delete_btn'.$i.'']))
{
	if(isset($_POST['check'.$i.'']))
	{
		$no= $_POST['tour_no'.$i.''];

		$q2="delete from tour where tour_no='$no'";

		$result2 = mysqli_query($con,$q2);
		if($result2){
			header("location:admin.php");
			ob_end_flush();
			die();
		}
		else{
			echo"Delete Failed";
		}		
	}

	else 
		echo"Please select Checkbox";
}
echo"</td>";

echo"<td>";
echo '<input class="input" type="checkbox" name="check'.$i.'" /> ';
echo"</td>";

echo"</tr>";

$i++;
}


echo "<tr>";
echo "<td>";
echo '<input class="input" type="text" name="text_no" />';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" name="text_name" />';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" name="text_cost" />';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" name="text_days" />';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" name="text_start" />';
echo "</td>";

echo "<td>";
echo '<input class="input" type="text" name="text_end" />';
echo "</td>";

echo "<td>";
echo '<input class="button" type="submit" value="Add" name="add_btn"/>';
if(isset($_POST['add_btn']))
{
		$no1 = $_POST['text_no']; 
		$name1 = $_POST['text_name'];
		$cost1 = $_POST['text_cost'];
		$days1 = $_POST['text_days'];
		$start1 = $_POST['text_start'];
		$end1 = $_POST['text_end'];

		if(!$no1 or !$name1 or !$cost1 or !$days1 or !$start1 or !$end1)
			echo"Fill all fields";
		else
		
$q3="insert into tour(tour_no,tour_name,cost,days,start_date,end_date) values('$no1','$name1','$cost1','$days1','$start1','$end1')";
$result3=mysqli_query($con,$q3);

		if($result3){
			header("location:admin.php");
			ob_end_flush();
			die();
		}
		else{
			echo"Add Failed";
		}	
}

?>

</table>
</form>
</div>

<br><br>
<div class="container">
 <a class="jumbo btn btn-danger btn-lg" href="admin_view.php" role="button" style="float:right">View Bookings</a>
</div>

</body>
</html>



