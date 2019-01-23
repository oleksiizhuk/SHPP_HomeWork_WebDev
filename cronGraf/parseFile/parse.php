<?php

use app\ParseValue;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'autoloader.php';

$parse = new ParseValue();
$parse->addContent();
