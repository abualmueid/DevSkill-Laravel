<?php 

namespace MVC;

include('vendor/autoload.php');

use System\Application;

$application = new Application(__DIR__);
$application->run();