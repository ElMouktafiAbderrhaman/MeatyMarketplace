<?php
include_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="font/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Ecommerce Website</title>
</head>

<body>
<style>
.card {
  height: 5000px;
  width: 350px;
  border: none;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.card-body {
  height: 150px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card-title {
  font-size: 1.2rem;
  margin-bottom: 0;
}

.card-text {
  margin-bottom: 0;
  font-weight: bold;
}

.btn-primary {
  width: 100%;
}

.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}

@media screen and (max-width: 768px) {
  .card {
    height: auto;
    width: 100%;
  }

  .card-body {
    height: auto;
    display: block;
  }

  .card-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
  }

  .btn-primary {
    margin-top: 10px;
  }
}

.card-img-top {
  height: 250px;
  width: 100%;
  object-fit: cover;
}
</style>


  <main>
    <div class="container">
      <form class="form-inline mt-3 mb-3" method="GET" action="products.php">
        <div class="input-group">
          <input class="form-control form-control-lg" type="text" name="search" placeholder="Search">
          <div class="input-group-append">
            <button class="btn btn-secondary btn-lg" type="submit">Search</button>
          </div>
        </div>
      </form>
      <div class="row">
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
        $sql = "SELECT * FROM products";
        $all_product = $conn->query($sql);
        $search_term = "";
        if (isset($_GET["search"])) {
          $search_term = $_GET["search"];
          $sql = "SELECT * FROM products WHERE product_name LIKE '%$search_term%'";
          $all_product = $conn->query($sql);
        } else {
          $sql = "SELECT * FROM products";
          $all_product = $conn->query($sql);
        }

        while ($row = mysqli_fetch_assoc($all_product)) {
        ?>
          <div class="col-md-4 col-sm-6 mb-4">
  <div class="card h-100">
    <img class="card-img-top" src="<?php echo $row["product_image"]; ?>" alt="">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row["product_name"]; ?></h5>
      <p class="card-text">$<?php echo $row["price"]; ?></p>
      <a href="confirmation.php?id=<?php echo $row["product_id"]; ?>" class="btn btn-primary">Buy</a>
    </div>
  </div>
</div>

        <?php
        }
        ?>
      </div>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>

