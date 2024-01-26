<?php
$receiving_email_address = 'themrx66@gmail.com';

// Check if the required form fields are set
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
    
    // Assign form data to variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Construct the email message
    $email_message = "
        <html>
        <body>
            <h2>New Form Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong> $message</p>
        </body>
        </html>
    ";

    // Send the email
    $success = mail($receiving_email_address, $subject, $email_message, $headers);

    if ($success) {
        echo 'success'; // You can customize this response as needed
    } else {
        echo 'error'; // You can customize this response as needed
    }

} else {
    echo 'error'; // Form fields not set, handle accordingly
}
?>

