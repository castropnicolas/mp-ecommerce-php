<?php
/*
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

$preference->save();*/