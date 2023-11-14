
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
    .navbar {
  position: relative;
  z-index: 9999;
}

    </style>
</head>
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
<body>
  

  <div class="overlay"></div>
  <div class="content">
    <h1>Welcome to  Meaty MARKETPALCE!</h1>
    <p>Check out our delicious and fresh alimentations products.</p>
    <a href="products.php" class="buy-button">Buy Now</a>
  </div>
    <style>
      header {
  position: relative;
  height: 100vh;
  background-image: url('background.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
 
}

.content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  color: #fff;
  z-index: 1;
}

.buy-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #fff;
  color: #333;
  font-weight: bold;
  border-radius: 4px;
  text-decoration: none;
  transition: background-color 0.2s ease-in-out;
}

.buy-button:hover {
  background-color: #333;
  color: #fff;
}

    </style>

</body>


