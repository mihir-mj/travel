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
	<style>
		.navbar-brand img{
	height:30px;
	padding-right:300px;
	}
	.navbar{
	padding:10px;
	}
	.navbar-nav li{
	padding-right:15px;
	font-weight:bold;
	font-size:16px;
	}
	.nav-link .navbar-light .navbar-nav{
	color:blue;
	} 
	.nav-link .navbar-light .navbar-nav:hover{
	color:pink;
	}
	</style>
</head>

<body>

<!-------------------------------------Navigation Bar --------------------------------------------->

<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container-fluid">
	<a class="navbar-brand" href="#"><img src="images/logo.png"></a>	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-		     controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"> </span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav" ml-auto>
			<li class="nav-item dropdown active">
			<a class ="nav-link dropdown-toggle" href="tour_details/tour_detail.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> India </a>

			<div class="dropdown-menu" aria-labelledby="dropdown04">
			<a class="dropdown-item" href="tour_details/tour_detail.html"> North</a>
			<a class="dropdown-item" href="tour_details/tour_detail.html"> South</a>
			<a class="dropdown-item" href="tour_details/tour_detail.html"> East</a>
			<a class="dropdown-item" href="tour_details/tour_detail.html"> West</a>
			<a class="dropdown-item" href="tour_details/tour_detail.html"> North-East</a>
			</div>
			</li>

			<li class="nav-item dropdown">
			<a class ="nav-link dropdown-toggle" href="tour_details/tour_detail.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> World </a>

			<div class="dropdown-menu" aria-labelledby="dropdown04">
			<a class="dropdown-item" href="tour_details/tour_detail.html"> Asia</a>
			<a class="dropdown-item" href="tour_details/tour_detail.html"> Europe</a>
			<a class="dropdown-item" href="tour_details/tour_detail.html"> Africa</a>
			<a class="dropdown-item" href="tour_details/tour_detail.html"> North-America</a>
			<a class="dropdown-item" href="tour_details/tour_detail.html"> Australia</a>
			</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="all_tours.php"> All Tours </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="blog.html"> Blogs </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="contact.html"> Contact Us </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="aboutus.html"> About Us </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="login.html"> Login </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="signup.html"> Sign Up </a>
			</li>



		</ul>
	</div>
   </div>
</nav>

<!-------------------------------------Navigation Bar --------------------------------------------->

<div class="container">
	<h1 class="h1-responsive font-weight-bold my-5"style="text-align:center">All Traventure Tours </h1>
</div>

<div class="container-fluid">
<table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Tour No
      </th>
      <th class="th-sm">Tour Name
      </th>
      <th class="th-sm">Cost (Rs.)
      </th>
      <th class="th-sm">Days
      </th>
      <th class="th-sm">Start Date
      </th>
      <th class="th-sm">End Date
      </th>
    </tr>
  </thead>
  <tbody>

   <?php
	while($rows=mysqli_fetch_assoc($result))
	{
   ?>	
		<tr> 
			<td><?php echo $rows['tour_no']; ?> </td>
			<td><?php echo $rows['tour_name']; ?> </td>
			<td><?php echo $rows['cost']; ?> </td>
			<td><?php echo $rows['days']; ?> </td>
			<td><?php echo $rows['start_date']; ?> </td>
			<td><?php echo $rows['end_date']; ?> </td>
		</tr> 
    <?php
	}
   ?> 
  </tbody>
  
</table>

 <a class="jumbo btn btn-danger btn-lg" href="book.html" role="button" style="float:right">Book Now</a>

</div>

</body>
</html>