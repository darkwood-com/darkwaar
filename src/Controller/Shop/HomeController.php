<?php

declare(strict_types=1);

namespace App\Controller\Shop;

use App\Model\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_shop_')]
class HomeController extends AbstractController
{
    #[Route('', name: 'home', methods: ['GET'])]
    public function home(): Response
    {
        return $this->render('shop/home.html.twig', [
            'page' => new Page(
                page: 'home',
                title: 'Darkwaar',
                description: 'Will you be the darkest one at waar?',
            ),
        ]);
    }
}
