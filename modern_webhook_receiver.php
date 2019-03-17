<?php
/**
 * Created by PhpStorm.
 * User: karan
 * Date: 11/21/2018
 * Time: 6:25 PM
 */

require_once 'vendor/autoload.php';

if($json = json_decode(file_get_contents("php://input"), true)) {
//    print_r($json);
    $data = $json;
} else {
//    print_r($_POST);
    $data = $_POST;
}

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
    ->setBody($data);

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

//echo "Saving data ...\n";
//
//$url = "http://localhost:5984/incoming";
//$meta = &#91;"received" => time(),
//    "status" => "new",
//     "agent" => $_SERVER['HTTP_USER_AGENT']];
// $options = ["http" => [
//     "method" => "POST",
//     "header" => ["Content-Type: application/json"],
//     "content" => json_encode(["data" => $data, "meta" => $meta])]
// ];
// $context = stream_context_create($options);
// $response = file_get_contents($url, false, $context);