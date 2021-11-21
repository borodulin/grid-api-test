<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;

class AlbumService
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    public function search(?string $term): QueryBuilder
    {
        /** @var AlbumRepository $repo */
        $repo = $this->entityManager->getRepository(Album::class);

        return $repo->searchByTerm($term);
    }
}
