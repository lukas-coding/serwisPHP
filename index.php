<?php

declare(strict_types=1);

namespace App;

require_once("src/Controller.php");
require_once("src/Request.php");
require_once("src/Model/Database.php");
require_once("src/utils/debug.php");
require_once("src/Exceptions/ConfigException.php");

use App\ConfigException;
use App\AppException;
use App\Controller;
use App\Request;
use Throwable;

$req = new Request($_GET, $_POST);



try {
    $dbconfig = require_once("config/config.php");
    Controller::initConfiguration($dbconfig);
    (new Controller($req))->run();
} catch (AppException $e) {
    echo '<h1 style="text-align: center">' . $e->getMessage() . '</h1>';
} catch (ConfigException $e) {
    echo '<h1 style="text-align: center">' . $e->getMessage() . '</h1>';
} catch (Throwable $e) {
    echo '<h1 style="text-align: center">Wystąpił błąd w aplikacji</h1>';
}
