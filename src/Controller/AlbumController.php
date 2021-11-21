<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\AlbumService;
use Borodulin\Bundle\GridApiBundle\GridApi\GridApiInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{
    /**
     * @Route(path="/album", methods={"GET"})
     */
    public function index(
        GridApiInterface $gridApi,
        AlbumService $albumService,
        ?string $term = null
    ): JsonResponse {
        return $this->json(
            $gridApi->paginate(
                $albumService->search($term)
            )
        );
    }
}
