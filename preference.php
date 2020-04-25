<?php

//CSP only works in modern browsers Chrome 25+, Firefox 23+, Safari 7+
$headerCSP = "Content-Security-Policy:" .
    "connect-src 'self' ;" . // XMLHttpRequest (AJAX request), WebSocket or EventSource.
    "default-src 'self';" . // Default policy for loading html elements
    "frame-ancestors 'self' ;" . //allow parent framing - this one blocks click jacking and ui redress
    "frame-src 'none';" . // vaid sources for frames
    "media-src 'self' *.example.com;" . // vaid sources for media (audio and video html tags src)
    "object-src 'none'; " . // valid object embed and applet tags src
    "report-uri https://example.com/violationReportForCSP.php;" . //A URL that will get raw json data in post that lets you know what was violated and blocked
    "script-src 'self' 'unsafe-inline' example.com code.jquery.com https://ssl.google-analytics.com ;" . // allows js from self, jquery and google analytics.  Inline allows inline js
    "style-src 'self' 'unsafe-inline';";// allows css from self and inline allows inline css
//Sends the Header in the HTTP response to instruct the Browser how it should handle content and what is whitelisted
//Its up to the browser to follow the policy which each browser has varying support
header($headerCSP);
//X-Frame-Options is not a standard (note the X- which stands for extension not a standard)
//This was never officially created but is supported by a lot of the current browsers in use in 2015 and will block iframing of your website
header('X-Frame-Options: SAMEORIGIN');

$baseUrl = 'https://castropnicolas-mp-commerce-php.herokuapp.com/';

require __DIR__ .  '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->id = "1234";
$item->title = $_POST['title'];
$item->description = "Dispositivo móvil de Tienda e-commerce";
$item->picture_url = $baseUrl . '/' . str_replace('./', '', $_POST['img']);
$item->quantity = intval($_POST['unit']);
$item->unit_price = floatval($_POST['price']);
$preference->items = array($item);

$payer = new MercadoPago\Payer();
$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_63274575@testuser.com";
$payer->phone = array(
    "area_code" => "011",
    "number" => "22223333"
);
$payer->identification = array(
    "type" => "DNI",
    "number" => "22333444"
);
$payer->address = array(
    "street_name" => "Falsa",
    "street_number" => 123,
    "zip_code" => "1111"
);
$preference->payer = $payer;

$preference->payment_methods = array(
    'excluded_payment_methods'=>array(
        array('id'=>'amex'),
    ),
    'excluded_payment_types'=>array(
        array('id'=>'atm'),
    ),
    'installments'=>6
);

$preference->back_urls = array(
    'failure'=> $baseUrl . 'failure.php',
    'pending'=> $baseUrl . 'pending.php',
    'success'=> $baseUrl . 'success.php'
);

$preference->notification_url = $baseUrl . 'notification.php';
$preference->auto_return = "approved";
$preference->external_reference = "ABCD1234";

$preference->save();