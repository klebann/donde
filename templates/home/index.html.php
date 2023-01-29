<?php

use App\Model\Contact;
use App\Service\Router;

$title = 'Welcome to our website!';
$bodyClass = 'index';

// Get a list of contacts from the database
$contacts = Contact::findAll();

ob_start(); ?>
    <h1>Welcome to our website!</h1>

    <p>We are a community of people who share a passion for writing and sharing stories. On our website, you can create your own posts, read and comment on other people's posts, and connect with other members of the community. We are excited to have you join us!</p>

    <p>To get started, you can create a new post by clicking the "Create a new post" button below. Or, if you want to read what others have written, you can browse the latest posts using the "POSTS" link in the navigation menu at the top of the page.</p>

    <p>
        <button onclick="location.href='<?php echo $router->generatePath('post-create') ?>'">
            Create a new post
        </button>
    </p>

    <h2>Contacts</h2>

<?php if (!empty($contacts)): ?>
    <ul>
        <?php foreach ($contacts as $contact): ?>
            <li><?php echo $contact->getFirstName() . ' ' . $contact->getLastName(); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No contacts found.</p>
<?php endif; ?>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';