<?php
/*
 Template Name: Ajax
 */


/*
 * Contact-Us && Register Affiliate form
 * */

if (intval($_GET['contact_us'] == 1)) {


// Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        sleep(1);

        if($_GET['contact_us']){
            // Get the form fields and remove whitespace.
            $full_name = strip_tags(trim($_POST["full_name"]));
            $full_name = str_replace(array("\r", "\n"), array(" ", " "), $full_name);
            $email = filter_var(trim($_POST["user_email"]), FILTER_SANITIZE_EMAIL);
            $message = strip_tags(trim($_POST["message"]));

            // Check that data was sent to the mailer.
            if (empty($full_name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Set a 400 (bad request) response code and exit.
                http_response_code(400);
                echo "Oops! There was a problem with your submission. Please complete the form and try again.";
                exit;
            }

            // Set the recipient email address.
            $recipient = 'zubair.khan@gaditek.com';

            // Build the email content.
            $email_content = "Full Name: $full_name\n";
            $email_content .= "Email: $email\n\n";
            $email_content .= "Message: \n$message\n";

            // Build the email headers.
            $email_headers = "From: $full_name <$email>";

            $success_msg = "Thank You! Your message has been sent.";
            $failure_msg = "Oops! There was a problem with your submission, please try again.";

        }

      // Send the email.
            if (mail($recipient, $subject, $email_content, $email_headers)) {
                // Set a 200 (okay) response code.
                http_response_code(200);
                echo $success_msg;
                exit;
            } else {
                // Set a 500 (internal server error) response code.
                http_response_code(500);
                echo $failure_msg;
                exit;
            }

    }
else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo $failure_msg;
        exit;
    }
}
?>

