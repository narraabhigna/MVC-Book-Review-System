<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

use Controllers\ReviewController;

require_once '../src/Controllers/ReviewController.php';

$controller = new ReviewController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'create':
                $controller->create($_SERVER['REQUEST_METHOD']);
                break;
            case 'update':
                $controller->update($_GET['book_id'],$_SERVER['REQUEST_METHOD']);
                break;
            case 'delete':
                $controller->delete($_GET['book_id']);
                break;
            case 'read':
                $controller->read($_GET['book_id']);
                break;
            default:
                echo 'Invalid action.';
        }
    } else {
        include __DIR__ . '/../src/Views/index.php';
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'create':
                $controller->create($_SERVER['REQUEST_METHOD']);
                break;
            case 'update':
                $controller->update($_POST['book_id'],$_SERVER['REQUEST_METHOD']);
                break;
            default:
                echo 'Invalid action.';
        }
    }
}

?>
