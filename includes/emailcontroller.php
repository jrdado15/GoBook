<?php 

require_once 'vendor/autoload.php';
require_once 'conn.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername('gobook.scrum@gmail.com')
  ->setPassword('scrumproject')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendVerificationEmail($Email, $token){

    
    if(isset($_SESSION['userId'])){
        $user = $_SESSION['userId'];
    }

    global $mailer;
    $body = '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Verify Email</title>
    </head>
    <body>
        <div class="wrapper">
            <p>Hi '.$user.', <br><br>Thank you for signing up on our website. Please click on the link below to verify your email.</p>
            <a href = "http://localhost/go_book/gobook/verification-page.php?token=' .$token. '">
                Verify your email address.
            </a>
        </div>
        
    </body>
    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
    ->setFrom(['gobook.scrum@gmail.com'])
    ->setTo($Email)
    ->setBody($body,'text/html');
    ;
 
    // Send the message
    $result = $mailer->send($message);
}

function sendPasswordResetLink($email ,$token){

    global $mailer;
    $body = '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Verify Email</title>
    </head>
    <body>
        <div class="wrapper">
            <p>Please click on the link below to reset your password.</p>
            <a href = "http://localhost/go_book/gobook/log-in.php?password-token=' .$token. '">
                Reset your password.
            </a>
        </div>
        
    </body>
    </html>';

    // Create a message
    $message = (new Swift_Message('Reset your password'))
    ->setFrom(['gobook.scrum@gmail.com'])
    ->setTo($email)
    ->setBody($body,'text/html');
    ;
 
    // Send the message
    $result = $mailer->send($message);
}
?>