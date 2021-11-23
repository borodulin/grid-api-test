<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\TrackService;
use Borodulin\Bundle\GridApiBundle\GridApi\GridApiInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TrackController extends AbstractController
{
    /**
     * @Route(path="/track", methods={"GET"})
     */
    public function index(
        GridApiInterface $gridApi,
        TrackService $trackService
    ): JsonResponse {
        return $this->json(
            $gridApi->paginate(
                $trackService->search()
            )
        );
    }
}
