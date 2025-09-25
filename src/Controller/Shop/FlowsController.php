<?php

declare(strict_types=1);

namespace App\Controller\Shop;

use App\Model\Page;
use App\Repository\ProgramRepository;
use App\Service\ProgramService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_shop_')]
class FlowsController extends AbstractController
{
    public function __construct(
        private readonly ProgramRepository $programRepository,
        private readonly ProgramService $programService,
    ) {}

    #[Route('/flows', name: 'flows', methods: ['GET'])]
    public function flows(): Response
    {
        $programs = $this->programRepository->findLastPublic(10);
        $programs = array_map(fn ($program) => $this->programService->getJsonProgram($program), $programs);

        return $this->render('shop/flows.html.twig', [
            'page' => new Page(
                page: 'flows',
                title: 'Darkwaar Games',
                description: 'Play our collection of strategy and puzzle games',
            ),
            'programs' => $programs,
        ]);
    }
}
