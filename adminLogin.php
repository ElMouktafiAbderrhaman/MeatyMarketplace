<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abdo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Check if the email exists in the database
  $sql = "SELECT * FROM admin WHERE email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // Check if the password is correct
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
      // Password is correct, start a session for the admin
      $_SESSION["admin_id"] = $row["id"];
      // Redirect to dashboard
      header("Location: dashboard.php");
      exit();
    } else {
      // Password is incorrect
      $error = "Invalid email or password";
    }
  } else {
    // Email not found
    $error = "Invalid email or password";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    
    h2 {
      color: #333333;
      text-align: center;
    }
    
    form {
      margin: auto;
      width: 50%;
      padding: 20px;
      border: 1px solid #cccccc;
      background-color: #ffffff;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #cccccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    input[type="submit"] {
      background-color: #4CAF50;
      color: #ffffff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
    
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    
    p.error {
      color: red;
      font-weight: bold;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<h2>Admin Login</h2>

<?php if (isset($error)) { ?>
  <p class="error"><?php echo $error; ?></p>
<?php } ?>

<form method="POST">
  <label>Email:</label>
  <input type="text" name="email">
  <label>Password:</label>
  <input type="password" name="password">
  <input type="submit" value="Login">
</form>

</body>
</html>

   