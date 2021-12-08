<?php

declare(strict_types=1);

namespace App\Controller;

use App\DataProvider\AlbumDataProvider;
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
        AlbumDataProvider $albumDataProvider,
        ?string $term = null
    ): JsonResponse {
        return $this->json(
            $gridApi->paginate(
                $albumDataProvider->withTerm($term)
            )
        );
    }
}
