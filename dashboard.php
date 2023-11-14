<?php 


session_start();
if(!isset($_SESSION["admin_id"])){
   // If not logged in redirect to login page
   header("location: adminLogin.php");
   exit;
}


?>




<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<header class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1 class="py-3">Hello MMP admin !</h1>
				</div>
				<div class="col-md-6">
					<nav class="py-3">
						<ul class="nav justify-content-end">
							<li class="nav-item">
								<a class="nav-link" href="RegisteredUsers.php"> Users </a>
                            </li>
                            <li class="nav-item">
								<a class="nav-link" href="add-product.php"> Add Products</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="rem-products.php">Remove Products</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="orders.php">Orders</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="Logoutadmin.php">Logout</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
</body>
</html>
