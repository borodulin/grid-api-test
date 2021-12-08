<?php

declare(strict_types=1);

namespace App\DataProvider;

use App\Entity\Album;
use Borodulin\Bundle\GridApiBundle\DoctrineInteraction\QueryBuilderProxy;
use Borodulin\Bundle\GridApiBundle\GridApi\DataProvider\DataProviderInterface;
use Borodulin\Bundle\GridApiBundle\GridApi\DataProvider\QueryBuilderInterface;
use Doctrine\ORM\EntityManagerInterface;

class AlbumDataProvider implements DataProviderInterface
{
    private EntityManagerInterface $entityManager;
    private ?string $term = null;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    public function withTerm(?string $term): self
    {
        $clone = clone $this;
        $this->term = $term;

        return $clone;
    }

    public function getQueryBuilder(): QueryBuilderInterface
    {
        $repo = $this->entityManager->getRepository(Album::class);

        return new QueryBuilderProxy($repo->searchByTerm($this->term));
    }
}
