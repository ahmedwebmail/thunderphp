<?php

require_once "../app/settings/config.php";
require_once "../app/route/Router.php";

spl_autoload_register( function ( $class ) {
    include '../app/Core/' . $class . '.php';
});

startRouting();

$db = new Database();
$db = $db->DbConnect();