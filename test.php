<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;


    require './vendor/autoload.php';

$name = $_REQUEST['name'];
$emails = $_REQUEST['email'];
$message = $_REQUEST['message'];
//var_dump($_REQUEST) ;
$content ="<h1> bonjour abdou ,</h1><br>
<p>un message de la part : $name</p>
<h5>sont email est:  $emails</h5>
<p>son contenu est :  $message</p>
";

$host = "localhost"; // database host
$username = "root"; // database username
$password = ""; // database password
$dbname = "abdo"; // database name

// create a mysqli connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// insert data into database
$sql = "INSERT INTO contactus ( name, email, message) VALUES ('¨$name', '$emails', '$message')";

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

        $mail->AddAddress("aelmouktafi65@gmail.com", $surname);
      
        $mail->body = $content;




        $mail->MsgHTML($content); 
        if(!$mail->Send()) {
            echo "<script>alert('THERE IS A PROBLEME,CHECK AGAIN.');</script>.  ",$mail->ErrorInfo;
        } else {
            echo "Email sent successfully";
            
            echo "<script>alert('Email sent successfully.');</script>";
            
        }
      header("Location: ContactUS.php");
        exit()

?>

