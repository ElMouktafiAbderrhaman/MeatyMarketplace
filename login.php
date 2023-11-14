
<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: home.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <!-- Add Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Add your own CSS file if needed -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h1 class="my-4">Login</h1>
        
        <?php if ($is_invalid): ?>
            <div class="alert alert-danger" role="alert">
                Invalid login
            </div>
        <?php endif; ?>
        
        <form method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email"
                       value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Log in</button>
            <p>You don't have an MPP acount ?.
                    You can  <a href="signup.php">Signup </a> from here.</p>
        </form>
    </div>

    <!-- Add Bootstrap JavaScript files at the end of the body tag -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>









