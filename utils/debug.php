<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set("display_errors", '1');

function dump($var)
{
    echo '<div style="display:inline-block;
            padding: 10px;
            border: 1px solid black;
            background-color: gray;">
            
            <pre>';
    print_r($var);
    echo '</pre></div></br>';
}
