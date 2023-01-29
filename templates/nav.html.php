<?php
/** @var $router \App\Service\Router */

?>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Strona główna</a></li>
    <li><a href="<?= $router->generatePath('map-index') ?>">Mapa</a></li>
    <li><a href="<?= $router->generatePath('plan-index') ?>">Plan</a></li>
    <li><a href="<?= $router->generatePath('find-index') ?>">Szukaj</a></li>
</ul>
<?php
