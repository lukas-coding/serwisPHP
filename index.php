<?php

declare(strict_types=1);

namespace App;

require_once("src/utils/debug.php");
require_once('src/View.php');

const DEFAULT_ACTION = 'layout';

$viewParams = [];


$page = $_GET['action'] ?? DEFAULT_ACTION;



dump($_GET);
dump($page);

$postData = $_POST ?? "";

dump($_POST);

// if ($action === 'create') {
//     $page = 'create';
// } else {
//     $page = 'layout';
// }


$view = new View;
$view->renderSite($page, $viewParams, $postData);
