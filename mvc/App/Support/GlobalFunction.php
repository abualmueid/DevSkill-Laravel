<?php 

namespace App\Support;

use System\Application;

function loadConfig(string $path): string
{
    $application = new Application();
    echo json_encode($application);

    return file_exists($path) ? include $path : 'Path does not exist!';
}