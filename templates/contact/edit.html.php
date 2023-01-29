<?php

/** @var \App\Model\Contact $contact */
/** @var \App\Service\Router $router */

$title = "Edit Contact {$contact->getFirstName()} {$contact->getLastName()} ({$contact->getId()})";
$bodyClass = "edit";

ob_start(); ?>
    <h1><?= $title ?></h1>
    <form action="<?= $router->generatePath('contact-edit') ?>" method="post" class="edit-form">
        <?php require __DIR__ . DIRECTORY_SEPARATOR . '_form.html.php'; ?>
        <input type="hidden" name="action" value="contact-edit">
        <input type="hidden" name="id" value="<?= $contact->getId() ?>">
    </form>

    <ul class="action-list">
        <li>
            <a href="<?= $router->generatePath('contact-index') ?>">Back to list</a></li>
        <li>
            <form action="<?= $router->generatePath('contact-delete') ?>" method="post">
                <input type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                <input type="hidden" name="action" value="contact-delete">
                <input type="hidden" name="id" value="<?= $contact->getId() ?>">
            </form>
        </li>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';