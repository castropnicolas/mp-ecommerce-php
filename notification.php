<?php

MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398");

switch($_POST["type"]) {
    case "payment":
        $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
        break;
    case "plan":
        $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
        break;
    case "subscription":
        $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
        break;
    case "invoice":
        $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
        break;
}

$content = json_encode($_POST);
file_put_contents('log.txt', $content);

?>
