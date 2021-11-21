<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="InvoiceLine")
 */
class InvoiceLine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="InvoiceLineId", type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Invoice")
     * @ORM\JoinColumn(name="InvoiceId", nullable=false)
     */
    private Invoice $invoice;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Track")
     * @ORM\JoinColumn(name="TrackId", nullable=false)
     */
    private Track $track;

    /**
     * @ORM\Column(name="UnitPrice", type="decimal", precision=10, scale=2)
     */
    private float $unitPrice;

    /**
     * @ORM\Column(name="Quantity", type="integer")
     */
    private int $quantity;

    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getTrack(): Track
    {
        return $this->track;
    }

    public function setTrack(Track $track): self
    {
        $this->track = $track;

        return $this;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
