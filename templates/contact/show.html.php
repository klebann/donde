<?php

/** @var \App\Model\Contact $contact */
/** @var \App\Service\Router $router */

$title = "{$contact->getFirstName()} {$contact->getLastName()} ({$contact->getId()})";
$bodyClass = 'show';

ob_start(); ?>
    <h1><?= $contact->getFirstName() ?> <?= $contact->getLastName() ?></h1>
    <article>
        Email: <?= $contact->getEmail() ?><br>
        Phone: <?= $contact->getPhone() ?>
    </article>

    <ul class="action-list">
        <li> <a href="<?= $router->generatePath('contact-index') ?>">Back to list</a></li>
        <li><a href="<?= $router->generatePath('contact-edit', ['id'=> $contact->getId()]) ?>">Edit</a></li>
    </ul>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';