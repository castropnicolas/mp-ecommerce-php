<?php
header("Content-Security-Policy: default-src 'self'; script-src https://www.mercadopago.com.ar; ");
header('location: ' . $_POST['back_url']);