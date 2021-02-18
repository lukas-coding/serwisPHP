<?php

declare(strict_types=1);

namespace App;

require_once("src/utils/debug.php");
require_once('src/View.php');

const DEFAULT_ACTION = 'layout';

$action = $_GET['action'] ?? DEFAULT_ACTION;

$view = new View;
$view->renderSite($action);
