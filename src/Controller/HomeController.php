<?php
namespace App\Controller;

use App\Service\Router;
use App\Service\Templating;

class HomeController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $html = $templating->render('home/index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }
}