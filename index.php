<?php

declare(strict_types=1);

namespace App;

require_once("src/Exceptions/AppException.php");
require_once("src/Exceptions/StorageException.php");
require_once("src/Exceptions/ConfigException.php");
require_once("src/Exceptions/NotFoundException.php");
require_once("src/Controller.php");
require_once("src/Request.php");
require_once("src/Model/Database.php");
require_once("src/utils/debug.php");

use App\Controller;
use App\Request;
use Throwable;
use App\AppException;

$request = new Request($_GET, $_POST);

try {
    $dbconfig = require_once("config/config.php");
    Controller::initConfiguration($dbconfig);
    (new Controller($_GET, $_POST))->run();
} catch (AppException $e) {
    echo '<h1 style="text-align: center">' . $e->getMessage() . '</h1>';
} catch (Throwable $e) {
    echo '<h1 style="text-align: center">Wystąpił błąd w aplikacji</h1>';
}
