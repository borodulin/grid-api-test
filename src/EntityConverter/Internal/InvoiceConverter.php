<?php

declare(strict_types=1);

namespace App\EntityConverter\Internal;

use App\Entity\Invoice;
use Borodulin\Bundle\GridApiBundle\EntityConverter\EntityConverterInterface;

class InvoiceConverter implements EntityConverterInterface
{
    public function __invoke(Invoice $invoice): array
    {
        return [
            'invoiceId' => $invoice->getId(),
            'total' => $invoice->getTotal(),
        ];
    }
}
