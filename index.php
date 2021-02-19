<?php

declare(strict_types=1);

namespace App;

use App\Controller\Controller;


require_once("src/Controller.php");
require_once('src/View.php');
require_once("src/utils/debug.php");



$controller = new Controller($_GET, $_POST);
$controller->run();
