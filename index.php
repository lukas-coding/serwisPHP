<?php

declare(strict_types=1);

require_once("templates/pages/start.php");
// require_once("templates/pages/layout.php");
require_once("utils/debug.php");

$action = $_GET['action'] ?? null;

dump($action);
