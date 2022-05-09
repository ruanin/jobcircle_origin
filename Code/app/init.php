<?php

require_once '../vendor/autoload.php';
require_once 'database.php';
require_once __DIR__ . '/core/App.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/models/BaseModel.php';
require_once __DIR__ . '/config/FlashMessage.php';
require_once __DIR__ . '/class/ClassRequest.php';
require_once __DIR__ . '/class/ClassToolkit.php';
require_once __DIR__ . '/class/Psr/Log/LogLevel.php';
require_once __DIR__ . '/class/Psr/Log/LoggerInterface.php';
require_once __DIR__ . '/class/Psr/Log/AbstractLogger.php';
require_once __DIR__ . '/class/Logger.php';
require_once __DIR__ . '/class/ClassSwiftmailer.php';
require_once __DIR__ . '/class/Menu.php';

$application_env = getenv('APPLICATION_ENV');
// Bitte Application Env festlegen...
if (empty($application_env)) {
    echo "Unser System ist zur Zeit wegen Wartungsarbeiten nicht erreichbar. ";
    exit();
}
$filename = 'smtp_'.$application_env.'.php'; 
require_once __DIR__ . '/config/settings_'.$application_env.'.php';

define('APPLICATION', __DIR__);
