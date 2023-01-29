<?php

/** @var \App\Model\Contact[] $contacts */
/** @var \App\Service\Router $router */

$title = 'Contact List';
$bodyClass = 'index';

ob_start(); ?>
    <h1>Contact List</h1>

    <a href="<?= $router->generatePath('contact-create') ?>">Create new</a>

    <ul class="index-list">
        <?php foreach ($contacts as $contact): ?>
            <li><h3><?= $contact->getFirstName() ?> <?= $contact->getLastName() ?></h3>
                <ul class="action-list">
                    <li><a href="<?= $router->generatePath('contact-show', ['id' => $contact->getId()]) ?>">Details</a></li>
                    <li><a href="<?= $router->generatePath('contact-edit', ['id' => $contact->getId()]) ?>">Edit</a></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';