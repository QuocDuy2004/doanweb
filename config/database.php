<?php 
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'phamquocduy_ltw_ccq2211b',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '0045_',
]);


use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

$capsule->setAsGlobal();
$capsule->bootEloquent();

