
<?php

$visitor_name = $_POST['visitor_name'];
$visitor_email = $_POST['visitor_email'];
$visitor_message = $_POST['visitor_message'];
$visitor_safe = $_POST['visitor_safe'];

$email_from = "$visitor_email";
$email_subject = "UTOPIA submission";

//Each line should be separated with a CRLF (\r\n). Lines should not be larger than 70 characters.
//example: $message = "Line 1\r\nLine 2\r\nLine 3";
//In case any of our lines are larger than 70 characters, we should use wordwrap()
//$message = wordwrap($message, 70, "\r\n");

// from gist.github.com
$email_body ="Here are the details:\r\nName: $visitor_name\n\nEmail: $visitor_safe\n\nMessage:\n$visitor_message";

$recipient = "precarihousingthemap@gmail.com";

$headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";

if(mail($recipient, $email_subject, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. We will review your submission, and if approved, will add to our site.</p>";
    } else    
    {
        echo '<p>We are sorry but your submission did not go through.</p>';
    }
?>

 