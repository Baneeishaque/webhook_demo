<?php
/**
 * Created by PhpStorm.
 * User: karan
 * Date: 11/21/2018
 * Time: 1:24 PM
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

//TODO : ext-symfony_debug ()
require_once 'vendor/autoload.php';

//echo "Welcome";

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

////$key     = $_ENV['key'];
////$sec     = $_ENV['sec'];
////$account = $_ENV['account'];

$post_request = array(
//    "post_uri" => "https://api.calltrackingmetrics.com/api/v1/accounts/$account/webhooks"
    "post_uri" => "http://139.59.65.128/webhook_demo/webhook_receiver.php"
);

$fieldsSet = array(
    "weburl" => "http://requestb.in/1m6lcos1",
    "position" => "end"
);

dump($post_request);
dump($fieldsSet);

$ch = curl_init();
//curl_setopt($ch, CURLOPT_USERPWD, "$key:$sec");
curl_setopt($ch, CURLOPT_URL, $post_request['post_uri']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsSet);
$response = curl_exec($ch);

dump($ch);
curl_close($ch);

echo $response;

//$data = json_decode($response);
//var_dump($data);