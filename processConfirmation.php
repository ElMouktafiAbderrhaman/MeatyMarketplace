<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

require './vendor/autoload.php';

$productname = $_REQUEST['product_name'];
$price = $_REQUEST['price'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$quantity = $_REQUEST['quantity'];
$address = $_REQUEST['address'];

$content = "
<h1>New Order Received</h1>
<p>Dear Admin,</p>
<p>A new order has been received. The details are as follows:</p>
<h2>Order Details</h2>
<p><strong>Name:</strong> $name</p>
<p><strong>Product:</strong> $productname</p>
<p><strong>Quantity:</strong> $quantity kg</p>
<p><strong>Address:</strong> $address</p>
<p><strong>Email:</strong> $email</p>
<p><strong>Phone Number:</strong> $phone</p>
<p><strong>Price:</strong> " . $price*$quantity . " $</p>
<p>Please take necessary action to process the order.</p>
<p>Thank you!</p>
";

// create a mysqli connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "abdo";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// insert data into database
$sql = "INSERT INTO confirmation (name, email, phone, product_name, price, quantity, address) 
        VALUES ('$name', '$email', '$phone', '$productname', '$price', '$quantity', '$address')";


if (mysqli_query($conn, $sql)) {

    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


// ;C:\laragon\bin\php\php8.1;
// C:\ProgramData\ComposerSetup\bin;
// C:\laragon\bin\composer;
// C:\Program Files\nodejs\;
// C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug = 0;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->Host       = "smtp.gmail.com";
    $mail->AuthType = 'XOAUTH2';

    $clientId="1078801737112-8a6kd4eebb1p602fmcrrrgv63e7v27uh.apps.googleusercontent.com";
    $clientSecret="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";
    $refreshToken="1//03j_e4tQ6S5gOCgYIARAAGAMSNwF-L9IrNzhsZL0Mv7QUqGRG-Jm2YMhndzR31V9rY4LFSd4X8NubbXRz-s-V1T87hyIcvQzGzW0";

    $email='aelmouktafi65@gmail.com';

    $mail->oauthUserEmail = $email;
    $mail->oauthClientId = $clientId;
    $mail->oauthClientSecret = $clientSecret;
    $mail->oauthRefreshToken =$refreshToken;


    $provider = new Google(
        [
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]
    );
    $mail->setOAuth(
        new OAuth(
            [
                'provider' => $provider,
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
                'refreshToken' => $refreshToken,
                'userName' => $email,
            ]
        )
    );


        $mail_cc="aelmouktafi65@gmail.com";
        $mail_cc_name="Oussama";

        $mail->IsHTML(true);
        $mail->SetFrom("aelmouktafi65@gmail.com", "PF Gestion des congés");

        $mail->AddAddress("aelmouktafi65@gmail.com", $name);
      
        $mail->body = $content;




        $mail->MsgHTML($content); 
        if(!$mail->Send()) {
            echo "<script>alert('THERE IS A PROBLEME,CHECK AGAIN.');</script>.  ",$mail->ErrorInfo;
        } else {
            echo "Email sent successfully";
            
            echo "<script>alert('Email sent successfully.');</script>";
            
        }
      header("Location: confirmation.php");
        exit()

?>


