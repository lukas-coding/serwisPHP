<?php

declare(strict_types=1);

namespace App;

use App\Controller;
use App\Database;

$dbconfig = require_once("config/config.php");
require_once("src/Controller.php");
require_once("src/Model/Database.php");
require_once("src/utils/debug.php");


(new Database($dbconfig));
(new Controller($_GET, $_POST))->run();
