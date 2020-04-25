<?php

require __DIR__ . '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

switch ($_POST["type"]) {
    case "payment":
        $payment = MercadoPago\Payment . find_by_id($_POST["id"]);
        if (!empty($payment))
            header("HTTP/1.1 200 OK");
        else
            header("HTTP/1.1 400 NOT_OK");
        break;
    case "plan":
        $plan = MercadoPago\Plan . find_by_id($_POST["id"]);
        break;
    case "subscription":
        $plan = MercadoPago\Subscription . find_by_id($_POST["id"]);
        break;
    case "invoice":
        $plan = MercadoPago\Invoice . find_by_id($_POST["id"]);
        break;
}

$content = json_encode($_POST);
file_put_contents('log.txt', $content);

$data = file_get_contents('php://input');
$f = fopen('raw.txt', 'a');
fwrite($f, $data);
fclose($f);

?>
