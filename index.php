<?php
use App\classes\Ul;

require_once __DIR__ . '/vendor/autoload.php';

$ul = new Ul('circle');
echo $ul->getView("asdasdasdas");
echo $ul->getType();
