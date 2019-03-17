<?php
/**
 * Created by PhpStorm.
 * User: karan
 * Date: 11/21/2018
 * Time: 5:50 PM
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
    ->setUsername('baneeishaque@gmail.com')
    ->setPassword('iqbsqltxrcmzqzkg');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['swiftmailer@demo.com' => 'Swift Mailer'])
    ->setTo(['baneeishaque@hotmail.com', 'k.baneeishaque@yahoo.com' => 'Banee Ishaque K'])
    ->setBody('Here is the message itself');

// Send the message
//$result = $mailer->send($message);
//
//echo $result;

if ($mailer->send($message)) {
    echo "Sent\n";
} else {
    echo "Failed\n";
}