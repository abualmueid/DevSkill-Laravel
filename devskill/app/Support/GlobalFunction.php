<?php

use DevSkill\Application;

function app(): Application
{
    echo "\nApp from Global Function";

    return Application::instance();
}

function loadConfig($path): array
{
    return include app()->path('config/' . $path);
}