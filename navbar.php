
<!DOCTYPE html>
<html>
<head>
    <title>Meaty Marketplace</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .navbar-brand img {
      height: 40px; /* set the height of the image */
      width: auto; /* make the width adjust automatically */
      margin-right: 10px; /* add some space between the logo and the text */
    }
    </style>
</head>
<body>
 <!-- Navigation Bar -->
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="home.php"><img src="Screenshot_20230322-085238_Chrome.jpg" alt="" ></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav mr-auto">
    
    <li class="nav-item">
      <a class="nav-link" href="products.php">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="ContactUS.php">Contact</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">Dashboard</a>   
    </li>
  </ul>
    <?php
    // start the PHP session
   
     session_start();
    // check if the user is logged in
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == true) {
        // if yes, show the logout option
        echo '<ul class="navbar-nav">';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="logout.php">Logout</a>';
        echo '</li>';
        echo '</ul>';
    } else {
        // if not, show the login and signup options
        echo '<ul class="navbar-nav">';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="login.php">Login</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="signup.php">Signup</a>';
        echo '</li>';
        echo '</ul>';
    }
    
    ?>
    <div class="header-container">
    </div>
  </div>
</nav>
</header>