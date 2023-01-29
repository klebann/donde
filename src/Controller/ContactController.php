<?php
namespace App\Controller;

use App\Exception\NotFoundException;
use App\Model\Contact;
use App\Service\Router;
use App\Service\Templating;

class ContactController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $contacts = Contact::findAll();
        $html = $templating->render('contact/index.html.php', [
            'contacts' => $contacts,
            'router' => $router,
        ]);
        return $html;
    }

    public function createAction(?array $requestPost, Templating $templating, Router $router): ?string
    {
        if ($requestPost) {
            $contact = Contact::fromArray($requestPost);
            // @todo missing validation
            $contact->save();

            $path = $router->generatePath('contact-index');
            $router->redirect($path);
            return null;
        } else {
            $contact = new Contact();
        }

        $html = $templating->render('contact/create.html.php', [
            'contact' => $contact,
            'router' => $router,
        ]);
        return $html;
    }

    public function editAction(int $contactId, ?array $requestPost, Templating $templating, Router $router): ?string
    {
        $contact = Contact::find($contactId);
        if (!$contact) {
            throw new NotFoundException("Missing contact with id $contactId");
        }

        if ($requestPost) {
            $contact->fill($requestPost);
            // @todo missing validation
            $contact->save();

            $path = $router->generatePath('contact-index');
            $router->redirect($path);
            return null;
        }

        $html = $templating->render('contact/edit.html.php', [
            'contact' => $contact,
            'router' => $router,
        ]);
        return $html;
    }

    public function showAction(int $contactId, Templating $templating, Router $router): ?string
    {
        $contact = Contact::find($contactId);
        if (!$contact) {
            throw new NotFoundException("Missing contact with id $contactId");
        }

        $html = $templating->render('contact/show.html.php', [
            'contact' => $contact,
            'router' => $router,
        ]);
        return $html;
    }

    public function deleteAction(int $contactId, Router $router): ?string
    {
        $contact = Contact::find($contactId);
        if (!$contact) {
            throw new NotFoundException("Missing contact with id $contactId");
        }

        $contact->delete();
        $path = $router->generatePath('contact-index');
        $router->redirect($path);
        return null;
    }
}