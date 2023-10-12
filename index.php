<?php

require_once 'controllers/UserController.php';

$controller = new UserController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $id = $_GET['id'] ?? 0;
        $controller->edit($id);
        break;
    case 'delete':
        $id = $_GET['id'] ?? 0;
        $controller->delete($id);
        break;
    case 'view':
        $id = $_GET['id'] ?? 0;
        $controller->view($id);
        break;
    case 'index':
    default:
        $controller->index();
        break;
        case 'allUsers':

            $userController->allUsers();
    
            break;
}
