<?php

$config = require "app/settings.php";
$db = $config['settings']['db'];

return array(
    "paths" => array(
        "migrations" => "migrations"
    ),
    "migration_base_class" => "Migrations\Migration",
    "environments" => array(
        "default_migration_table" => "phinxlog",
        "default_database" => "dev",
        "dev" => array(
            "adapter" => $db['driver'],
            "host" => $db['host'],
            "name" => $db['database'],
            "user" => $db['username'],
            "pass" => $db['password'],
            "port" => $db['port']
        )
    )
);
