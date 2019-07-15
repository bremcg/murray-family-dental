<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$first_name = $_POST['first_name']; // required
$last_name = $_POST['last_name']; // required
$email_from = $_POST['email']; // required
$phone_number = $_POST['phone_number']; // not required
$appointment_date = $_POST['appointment_date']; // already formatted by form
$preffered_time = $_POST['preffered_time']; // already formatted by form
$symptoms = $_POST['symptoms']; // required





// Tell PHPMailer to use SMTP
$mail->isSMTP();

// Replace sender@example.com with your "From" address.
// This address must be verified with Amazon SES.
$mail->setFrom('sender@example.com', 'Sender Name');

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
// Also note that you can include several addAddress() lines to send
// email to multiple recipients.
$mail->addAddress('recipient@example.com', 'Recipient Name');

// Replace smtp_username with your Amazon SES SMTP user name.
$mail->Username = 'smtp_username';

// Replace smtp_password with your Amazon SES SMTP password.
$mail->Password = 'smtp_password';

// Specify a configuration set. If you do not want to use a configuration
// set, comment or remove the next line.
$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');

// If you're using Amazon SES in a region other than US West (Oregon),
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
// endpoint in the appropriate region.
$mail->Host = 'email-smtp.us-west-2.amazonaws.com';

// The subject line of the email
$mail->Subject = 'Amazon SES test (SMTP interface accessed using PHP)';

// The HTML-formatted body of the email
$body="";

$body .=  "<ul><li>First Name:" . $first_name . "</li>";
$body .=  "<li>Last Name:" . $last_name . "</li>";
$body .= "<li>Email:" . $email_from . "</li>";
$body .= "<li>Phone Number:" . $phone_number . "</li>";
$body .= "<li>Appointment Date:" . $appointment_date . "</li>";
$body .= "<li>Time:" . $preffered_time . "</li>";
$body .= "<li>Symptoms:" . $symptoms . "</li>";

$mail->Body = $body;

// Tells PHPMailer to use SMTP authentication
$mail->SMTPAuth = true;

// Enable TLS encryption over port 587
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Tells PHPMailer to send HTML-formatted email
$mail->isHTML(true);

// The alternative email body; this is only displayed when a recipient
// opens the email in a non-HTML email client. The \r\n represents a
// line break.
$mail->AltBody = "Email Test\r\nThis email was sent through the
    Amazon SES SMTP interface using the PHPMailer class.";

$mail->send();
 header('Location: contact-thank-you.html');
 exit();

?>
