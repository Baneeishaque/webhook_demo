<?php
/**
 * Created by PhpStorm.
 * User: karan
 * Date: 11/21/2018
 * Time: 1:21 PM
 */

//TODO : DB log
//TODO : FCM log
//TODO : SMS log

require_once 'vendor/autoload.php';

$received_data = file_get_contents('php://input');

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
    ->setUsername('baneeishaque@gmail.com')
    ->setPassword('iqbsqltxrcmzqzkg');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Webhook Data'))
    ->setFrom(['swiftmailer@webhook.com' => 'Swift Mailer Webhook'])
    ->setTo(['baneeishaque@hotmail.com', 'k.baneeishaque@yahoo.com' => 'Banee Ishaque K'])
    ->setBody($received_data);

// Send the message
//$result = $mailer->send($message);
//
//echo $result;

if ($mailer->send($message)) {
    echo "Sent\n";
} else {
    echo "Failed\n";
}

//echo $received_data;