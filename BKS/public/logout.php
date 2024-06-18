<?php

require __DIR__ . '/../vendor/autoload.php';

use Controllers\UserController;
// require_once '../src/Controllers/UserController.php';

$controller = new UserController();
$controller->logout();

?>