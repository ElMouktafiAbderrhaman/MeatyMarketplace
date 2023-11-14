<?php include('navbar.php');?>



<?php 


// Check if user is logged in
if(!isset($_SESSION['user_id'])){
   // If not logged in redirect to login page
   header("location: login.php");
   exit;


}

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abdo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(!isset($_REQUEST["id"])){
  // If "id" parameter is not set, redirect to another page
  header("location: products.php");
  exit;
}

$sql = "SELECT * FROM products WHERE product_id = " . $_REQUEST["id"];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $productname = $row["product_name"]; 
    $price = $row["price"];
  }
} else {
  echo "0 results";
}

mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
  
<head>
     <title>Confirmée</title>
  <style>
   /* Center the form and set font styles */
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  font-family: Arial, sans-serif;
  font-size: 16px;
  margin: 5px auto;
  max-width: 500px;
}

/* Style the form labels */
form label {
  margin-top: 10px;
  margin-bottom: 5px;
  font-weight: bold;
}

/* Style the form inputs */
form input {
  padding: 10px;
  margin-top: 2px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
  width: 100%;
}

/* Style the submit button */
form button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
  </style>
</head>
<body>
  <h1 style="text-align: center;" class=''> CONFIRME YOUR ORDER </h1>
  <p style="text-align: center;">Please fill out the form below to confirm your order:</p>
  <form action="processConfirmation.php" method="POST" >
  <label for="product_name">Article</label>
   <input type="text" id="product_name" name="product_name" placeholder="" value=<?php echo $productname  ?>>  
   <label for="price">Price</label>
  <input type="number" id="price" name="price" placeholder="" value=<?php echo $price  ?>>
 <label for="name">Name</label>
  <input type="text" id="name" name="name" placeholder="Your name.." required>
 <label for="phone">Phone Number</label>
  <input type="number" id="phone" name="phone" placeholder="Your phone number.." required>
 <label for="quantity">Email</label>
  <input type="email" id="email" name="email" placeholder="Your email.." required>
 <label for="quantity">Quantity Wanted</label>
  <input type="number" id="quantity" name="quantity" placeholder="Your quantity wanted.." required>
 <label for="address">Address</label>
  <input type="text" id="address" name="address" placeholder="Your Address.." required>

 <button type="submit">CONFIRM</button>

</form> 
   
 
  
  </body> 
 </html>

 <?php include('footer.php');?>  