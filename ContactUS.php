<?php 
 include('navbar.php');


?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <form action="test.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your name.." required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email.." required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" placeholder="Write something.." style="height:200px" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        var form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var name = document.querySelector('#name').value;
            var email = document.querySelector('#email').value;
            var message = document.querySelector('#message').value;
            var url = 'test.php';
            var params = '&name='+name+'&email='+email+'&message='+message;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert("YOUR MESSAGE SENT SUCCESSFULLY");
                }
            };
            xmlhttp.open("POST", url, true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send(params);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php include('footer.php');?>
