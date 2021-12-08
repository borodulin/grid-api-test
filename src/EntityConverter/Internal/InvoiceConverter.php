<?php

declare(strict_types=1);

namespace App\EntityConverter\Internal;

use App\Entity\Invoice;
use Borodulin\Bundle\GridApiBundle\EntityConverter\CustomScenarioInterface;
use Borodulin\Bundle\GridApiBundle\EntityConverter\EntityConverterInterface;
use Borodulin\Bundle\GridApiBundle\EntityConverter\ScenarioInterface;

class InvoiceConverter implements EntityConverterInterface, CustomScenarioInterface
{
    private ScenarioInterface $scenario;

    public function __construct(
        ScenarioInterface $scenario
    ) {
        $this->scenario = $scenario;
    }

    public function __invoke(Invoice $invoice): array
    {
        return [
            'invoiceId' => $invoice->getId(),
            'total' => $invoice->getTotal(),
        ];
    }

    public function getScenario(): ScenarioInterface
    {
        return $this->scenario;
    }
}
