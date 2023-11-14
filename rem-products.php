<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "abdo";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the "delete" button was clicked for a user
    if (isset($_POST["delete"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM products WHERE product_id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>product deleted successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting user: " . $conn->error . "</div>";
        }
    }

    // Fetch the list of registered users
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    error_reporting(E_ALL);

    // Display the list of users in a dashboard
    echo "<div class='container'>";
    echo "<h1 class='mt-5 mb-3'>Remove Products</h1>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Name</th><th>Email</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["product_name"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='id' value='".$row["product_id"]."'>";
        echo "<button class='btn btn-danger' name='delete' type='submit'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";

    // Close the database connection
    $conn->close();
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
