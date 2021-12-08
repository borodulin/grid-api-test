<?php

declare(strict_types=1);

namespace App\EntityConverter;

use App\Entity\Track;
use Borodulin\Bundle\GridApiBundle\EntityConverter\EntityConverterInterface;

class TrackConverter implements EntityConverterInterface
{
    public function __invoke(Track $track): array
    {
        return [
            'id' => $track->getId(),
            'name' => $track->getName(),
        ];
    }
}
