<?php

// Replace the values in the following lines with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abdo";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

// Prepare the SQL statement
$sql = "INSERT INTO contact (email, subject, message) VALUES ('$email', '$subject', '$message')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

// Send email notification
$to = "aelmouktafi65@gmail.com";
$subject = "New Contact Form Submission";
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8\r\n";
$body = "<html><body>";
$body .= "<h2>Contact Form Submission</h2>";
$body .= "<p><strong>Email:</strong> $email</p>";
$body .= "<p><strong>Subject:</strong> $subject</p>";
$body .= "<p><strong>Message:</strong> $message</p>";
$body .= "</body></html>";
mail($to, $subject, $body, $headers);

?>
