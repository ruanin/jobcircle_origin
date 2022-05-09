<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$application_env =  getenv('APPLICATION_ENV');
// Bitte Application Env festlegen...
if(empty($application_env)){
    echo "Unser System ist zur Zeit wegen Wartungsarbeiten nicht erreichbar. ";
    exit();
}
$filename = 'database_'.$application_env.'.php';

$capsule->addConnection(require_once __DIR__ .'/config/'.$filename);

$capsule->bootEloquent();