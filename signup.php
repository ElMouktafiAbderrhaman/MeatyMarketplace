


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
    <title>Signup</title>
    <meta charset="UTF-8">
    <!-- Add Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Add your own CSS file if needed -->
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
</head>
<body>

    <div class="container">
        <h1 class="my-4">Signup</h1>
        <form action="signup.php" method="post" id="signup" novalidate>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Repeat password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <button class="btn btn-primary">Sign up</button>

        </form>
    </div>

    <!-- Add Bootstrap JavaScript files at the end of the body tag -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body> 

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <!-- Form validation -->
    <script>
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')
  
      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
  
        form.classList.add('was-validated')
          }, false)
        })
    </script>
  </body>
  </html>
 
  <?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

// check if email is already taken
$email = $_POST["email"];
$sql = "SELECT COUNT(*) FROM user WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    // email is already taken, show error message to user
    die("Error: email address is already taken");
} else {
    // email is not taken, proceed with signup
    $name = $_POST["name"];
    $password = $_POST["password"];
    $password_confirmation = $_POST["password_confirmation"];

    // perform other validation checks here

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, email, password_hash)
            VALUES (?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sss", $name, $email, $password_hash);                 

    if ($stmt->execute()) {
        header("Location: signup-success.php");
        exit;
    } else {
        die("Error: " . $mysqli->error);
    }
}







