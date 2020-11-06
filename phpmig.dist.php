<?php
use Illuminate\Container\Container;
use \Phpmig\Adapter;
use Illuminate\Database\Capsule\Manager as Capsule;

// include your bootstrap file with Capsule manager implementation
// todo require dirname(__FILE__) . '/bootstrap.php';

$container = new Container();
$container['phpmig.adapter'] = new Adapter\Illuminate\Database($capsule, 'migrations');
$container['phpmig.migrations_path'] = function () {
    return dirname(__FILE__) . '/migrations';
};

// I can run this directly, because Capsule is set as globally
// with $capsule->setAsGlobal(); line at /bootstrap.php
$container['schema'] = Capsule::schema();

return $container;