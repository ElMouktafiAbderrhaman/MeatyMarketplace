<script>
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

$mysqli = require _DIR_ . "/database.php";

// check if email is already taken
$email = $_POST["email"];
$sql = "SELECT COUNT(*) FROM admin WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    // email is already taken, show error message to user
    die("Error: email address is already taken") ;
} else {
    // email is not taken, proceed with signup
    $name = $_POST["name"];
    $password = $_POST["password"];
    $password_confirmation = $_POST["password_confirmation"];

    // perform other validation checks here

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (name, email, password_hash)
            VALUES (?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sss", $name, $email, $password_hash);

    if ($stmt->execute()) {
        header("Location: login1.php");
        exit;
    } else {
        die("Error: " . $mysqli->error);
    }
}