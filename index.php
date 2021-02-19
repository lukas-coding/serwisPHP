<?php

declare(strict_types=1);

namespace App;

use App\Controller\Controller;

$dbconfig = require_once("config/config.php");
require_once("src/Controller.php");
require_once('src/View.php');
require_once("src/utils/debug.php");


Controller::initDbConfig($dbconfig);
(new Controller($_GET, $_POST))->run();
