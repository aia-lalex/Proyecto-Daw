<?php

require_once("bd.php");
require_once("controllers/araalController.php");

$server = new SoapServer(
    null,
    array(
        'uri' => 'https://de-talles.000webhostapp.com/'
    )

);

$server->setClass('araalController');
$server->handle();
