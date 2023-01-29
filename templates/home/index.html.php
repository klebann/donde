<?php

use App\Model\Contact;
use App\Service\Router;

$title = 'Welcome to our website!';
$bodyClass = 'index';

// Get a list of contacts from the database
$contacts = Contact::findAll();

ob_start(); ?>
    <main>
        <section id="map">
            <i class="fas fa-map-marked-alt fa-5x"></i>
            <h2>Mapa Budynków</h2>
            <p>Znajdź swoje miejsce zajęć na mapie budynku.</p>
        </section>
        <br><br>
        <section id="plan">
            <i class="fas fa-book-open fa-5x"></i>
            <h2>Plan Lekcji</h2>
            <p>Przeglądaj i zarządzaj swoimi zajęciami dydaktycznymi.</p>
        </section>
        <br><br>
        <section id="find">
            <i class="fas fa-search fa-5x"></i>
            <h2>Szukaj</h2>
            <p>Znajdź informacje o swoich zajęciach i nauczycielach.</p>
        </section>
    </main>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';