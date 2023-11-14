<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
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
        $sql = "DELETE FROM confirmation WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>User deleted successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting Order: " . $conn->error . "</div>";
        }
    }

    // Fetch the list of registered users
    $sql = "SELECT * FROM confirmation";
    $result = $conn->query($sql);

    // Display the list of users in a dashboard
    echo "<div class='container'>";
    echo "<h1 class='mt-5 mb-3'>Orders</h1>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Product Name</th><th>quantity</th><th>Name</th><th>email</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["product_name"]."</td>";
        echo "<td>".$row["quantity"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='id' value='".$row["id"]."'>";
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