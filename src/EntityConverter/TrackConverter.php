<?php

declare(strict_types=1);

namespace App\EntityConverter;

use App\Entity\Track;
use Borodulin\Bundle\GridApiBundle\EntityConverter\EntityConverterInterface;
use Borodulin\Bundle\GridApiBundle\GridApi\Filter\CustomFilterInterface;
use Doctrine\ORM\QueryBuilder;

class TrackConverter implements EntityConverterInterface, CustomFilterInterface
{
    public function __invoke(Track $track): object
    {
        return $track;
    }

    public function getFilterFields(): array
    {
        return [
            'price' => function (QueryBuilder $queryBuilder, string $value): void {
                switch ($value) {
                    case 'low':
                        $queryBuilder->andWhere('track.unitPrice < 1');
                        break;
                    case 'high':
                        $queryBuilder->andWhere('track.unitPrice >= 1');
                        break;
                }
            },
        ];
    }
}
