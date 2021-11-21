<?php

declare(strict_types=1);

namespace App\Controller\Internal;

use App\Entity\Invoice;
use Borodulin\Bundle\GridApiBundle\EntityConverter\ScenarioInterface;
use Borodulin\Bundle\GridApiBundle\GridApi\EntityApiInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    /**
     * @Route(path="/internal/invoice/{id<\d+>}", methods={"GET"})
     */
    public function index(
        Invoice $invoice,
        EntityApiInterface $entityApi,
        ScenarioInterface $scenario
    ): JsonResponse {
        return $this->json(
            $entityApi->setScenario($scenario)->show($invoice)
        );
    }
}
