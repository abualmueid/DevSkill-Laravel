<?php 

namespace MVC;

include('System/Application.php');
// include('vendor/autoload.php');

use System\Application;

$application = new Application(__DIR__);
$application->run();