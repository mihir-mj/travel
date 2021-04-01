<?php
SESSION_START();
if(!isset($_SESSION['firstname']))
{
header('location:login.html');
} 
$con = mysqli_connect("localhost","root","");
if(!$con)
{
die("connection failed: ".mysqli_connect_error());
} 
$get=$_SESSION['firstname'];
mysqli_select_db($con, 'web');
$q="select t.tour_no, t.tour_name,  t.cost, t.days, t.start_date, t.end_date, b.bk_no, b.adult, b.child, b.room from tour t, book_1 b where t.tour_no=b.tour_no and b.first_name='$get'";
$result=mysqli_query($con,$q);
?>

<!doctype html>
<html>
<head>
	<title> User </title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<script src="js/jquery.min.js"></script>
    	<script src="js/jquery-ui.js"></script>
    	<script src="js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
	<h1 class="h1-responsive font-weight-bold my-5"style="text-align:center">Welcome <?php echo $_SESSION['firstname']; ?></h1>
</div>

<div class="container">
	<h1 class="h1-responsive font-weight-bold my-5"style="text-align:center">My Booking </h1>
</div>

<div class="container-fluid">
<table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Bk No
      </th>
      <th class="th-sm">Tour No
      </th>
      <th class="th-sm">Tour Name
      </th>
      <th class="th-sm">Cost
      </th>
      <th class="th-sm">Days
      </th>
      <th class="th-sm">Start Date
      </th>
      <th class="th-sm">End Date
      </th>
	<th class="th-sm">Adult
      </th>
	<th class="th-sm">Child
      </th>
      <th class="th-sm">Room
      </th>
    </tr>
  </thead>
  <tbody>

   <?php
	while($rows=mysqli_fetch_assoc($result))
	{
   ?>	
		<tr> 
			<td><?php echo $rows['bk_no']; ?> </td>
			<td><?php echo $rows['tour_no']; ?> </td>
			<td><?php echo $rows['tour_name']; ?> </td>
			<td><?php echo $rows['cost']; ?> </td>
			<td><?php echo $rows['days']; ?> </td>
			<td><?php echo $rows['start_date']; ?> </td>
			<td><?php echo $rows['end_date']; ?> </td>
			<td><?php echo $rows['adult']; ?> </td>
			<td><?php echo $rows['child']; ?> </td>
			<td><?php echo $rows['room']; ?> </td>
		</tr> 
    <?php
	}
   ?> 
  </tbody>
  
</table>

</div>

</body>
</html>