<?php

declare(strict_types=1);

namespace App\DataProvider;

use App\Entity\Track;
use Borodulin\Bundle\GridApiBundle\DoctrineInteraction\QueryBuilderProxy;
use Borodulin\Bundle\GridApiBundle\GridApi\DataProvider\CustomFilterInterface;
use Borodulin\Bundle\GridApiBundle\GridApi\DataProvider\DataProviderInterface;
use Borodulin\Bundle\GridApiBundle\GridApi\DataProvider\QueryBuilderInterface;
use Doctrine\ORM\EntityManagerInterface;

class TrackDataProvider implements DataProviderInterface, CustomFilterInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getQueryBuilder(): QueryBuilderInterface
    {
        $repo = $this->entityManager->getRepository(Track::class);

        return new QueryBuilderProxy($repo->createQueryBuilder('t'));
    }


    public function getFilterFields(): array
    {
        return [
            'price' => function (QueryBuilderProxy $proxy, string $value): void {
                switch ($value) {
                    case 'low':
                        $proxy->getQueryBuilder()->andWhere('t.unitPrice < 1');
                        break;
                    case 'high':
                        $proxy->getQueryBuilder()->andWhere('t.unitPrice >= 1');
                        break;
                }
            },
            'album' => 't.album',
        ];
    }
}
