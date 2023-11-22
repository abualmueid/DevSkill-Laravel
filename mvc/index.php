<?php 

include('vendor/autoload.php');

use System\Application;

$application = Application::instance(__DIR__);
$application->run();