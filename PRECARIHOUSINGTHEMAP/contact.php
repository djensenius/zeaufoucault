
<?php
  
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $location = "";
    $concerned_category = "";
    $visitor_message = "";
    $email_body = "<div>";
      
    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span>
                        </div>";
    }
 
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
                        </div>";
    }
      
    if(isset($_POST['location'])) {
        $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Location:</b></label>&nbsp;<span>".$location."</span>
                        </div>";
    }
      
    if(isset($_POST['concerned_category'])) {
        $concerned_category = filter_var($_POST['concerned_category'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Category:</b></label>&nbsp;<span>".$concerned_category."</span>
                        </div>";
    }
      
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
                           <label><b>Description:</b></label>
                           <div>".$visitor_message."</div>
                        </div>";
    }
      
    //Remember to change these to your email.
    if($concerned_category == "red") {
        $recipient = "clowittmann@gmail.com"; // can have different emails for different categories
    }
    else if($concerned_category == "green") {
        $recipient = "clowittmann@gmail.com";
    }
    else if($concerned_category == "other") {
        $recipient = "clowittmann@gmail.com";
    }
    else {
        $recipient = "clowittmann@gmail.com";
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $location, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. We will review your submission, and if approved, will add to our site.</p>";
    } else {
        echo '<p>We are sorry but your submission did not go through.</p>';
    }
      
} else {
    echo '<p>Something went wrong</p>';// not sure what can set this up
}
?>

