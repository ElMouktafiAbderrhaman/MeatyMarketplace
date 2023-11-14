


<?php
include('navbar.php');
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



if(isset($_POST["submit"])){
  $productname = $_POST["product_name"];
  $price = $_POST["price"];
  $discount = $_POST["discount"];

  //For uploads photos
  $upload_dir = "uploads/"; //this is where the uploaded photo stored
  $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
  $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
  $check = $_FILES["imageUpload"]["size"]; // to detect the size of the image
  $upload_ok = 0;

      if($productname != "" && $price !=""){
          move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);

          $sql = "INSERT INTO products(product_name, price, discount, product_image)
        VALUES('$productname', $price, $discount, '$product_image')";

          if($conn->query($sql) === TRUE){
              echo "<script>alert('your product uploaded successfully')</script>";
          }
      }
  }


  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-DmXm12E+g3JvouUtIbewQWmJvKGOgIb6W5QozooFxt2R+oq1Fyzn2I754+Y6EVoB" crossorigin="anonymous">
    <link rel="stylesheet" href="upload.css">
</head>
<body>
  
    
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Add Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="add-product.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="number" name="discount" id="discount" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="imageUpload">Product Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="imageUpload" id="imageUpload" class="custom-file-input" required>
                                        <label class="custom-file-label" for="imageUpload">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   







