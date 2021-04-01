<?php
SESSION_START();
$con = mysqli_connect("localhost","root","");
if(!$con)
{
die("connection failed: ".mysqli_connect_error());
} 
mysqli_select_db($con, 'web');
$q="select * from book_1 inner join book_2 on book_1.bk_no=book_2.bk_no";
$result=mysqli_query($con,$q);
?>

<!doctype html>
<html>
<head>
	<title> All Tours </title>
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
	<h1 class="h1-responsive font-weight-bold my-5"style="text-align:center">All Bookings </h1>
</div>

<div class="container-fluid">
<table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">BK No
      </th>
      <th class="th-sm">Tour No
      </th>
      <th class="th-sm">Tour Name
      </th>
      <th class="th-sm">First Name
      </th>
      <th class="th-sm">Last Name
      </th>
      <th class="th-sm">Email
      </th>
      <th class="th-sm">Adult
      </th>
      <th class="th-sm">Child
      </th>
	<th class="th-sm">Room No
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
			<td><?php echo $rows['first_name']; ?> </td>
			<td><?php echo $rows['last_name']; ?> </td>
			<td><?php echo $rows['email']; ?> </td>
			<td><?php echo $rows['adult']; ?> </td>
			<td><?php echo $rows['child']; ?> </td>
			<td><?php echo $rows['room']; ?> </td>
		</tr> 
    <?php
	}
   ?> 
  </tbody>
  
</table>

 <a class="btn btn-danger btn" href="homepage.html" role="button" style="float:right">Continue to homepage</a>

</div>

</body>
</html>