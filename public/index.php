<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

$config = new \App\Service\Config();

$templating = new \App\Service\Templating();
$router = new \App\Service\Router();

$action = $_REQUEST['action'] ?? null;
switch ($action) {
    case null:
        $controller = new \App\Controller\HomeController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'post-index':
        $controller = new \App\Controller\PostController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'post-create':
        $controller = new \App\Controller\PostController();
        $view = $controller->createAction($_REQUEST['post'] ?? null, $templating, $router);
        break;
    case 'post-edit':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\PostController();
        $view = $controller->editAction($_REQUEST['id'], $_REQUEST['post'] ?? null, $templating, $router);
        break;
    case 'post-show':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\PostController();
        $view = $controller->showAction($_REQUEST['id'], $templating, $router);
        break;
    case 'post-delete':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\PostController();
        $view = $controller->deleteAction($_REQUEST['id'], $router);
        break;

    // Contact Model
    case 'contact-index':
        $controller = new \App\Controller\ContactController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'contact-create':
        $controller = new \App\Controller\ContactController();
        $view = $controller->createAction($_REQUEST['contact'] ?? null, $templating, $router);
        break;
    case 'contact-edit':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\ContactController();
        $view = $controller->editAction($_REQUEST['id'], $_REQUEST['contact'] ?? null, $templating, $router);
        break;
    case 'contact-show':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\ContactController();
        $view = $controller->showAction($_REQUEST['id'], $templating, $router);
        break;
    case 'contact-delete':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\ContactController();
        $view = $controller->deleteAction($_REQUEST['id'], $router);
        break;

    default:
        $view = 'Not found';
        break;
}

if ($view) {
    echo $view;
}
