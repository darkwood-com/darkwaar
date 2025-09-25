<?php

declare(strict_types=1);

namespace App\Controller\Shop;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Model\Page;
use App\Service\ContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

#[Route('/', name: 'app_shop_')]
class ContactController extends AbstractController
{
    public function __construct(protected ContactService $contactService) {}

    #[Route('/contact', name: 'contact', methods: ['GET', 'POST'])]
    public function contact(Request $request): Response
    {
        $contact = new Contact();
        $contact->setUid(Uuid::v7()->toString());

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->contactService->save($contact);

            $this->addFlash('success', 'Your message has been sent, we will be glad to hear from you!');

            return $this->redirectToRoute('app_shop_contact');
        }

        return $this->render('shop/contact.html.twig', [
            'page' => new Page(
                page: 'contact',
                title: 'Contact Darkwaar',
                description: 'Get in touch with the Darkwaar team',
            ),
            'form' => $form->createView(),
        ]);
    }
}
