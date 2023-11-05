<?php

include('vendor/autoload.php');

// $application = new \DevSkill\Application(__DIR__);
$application = \DevSkill\Application::instance(__DIR__);

echo $application->rootPath();
echo $application->boot(); 

