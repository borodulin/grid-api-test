<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="Invoice")
 */
class Invoice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="InvoiceId", type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer")
     * @ORM\JoinColumn(name="CustomerId", nullable=false, referencedColumnName="CustomerId")
     */
    private Customer $customer;

    /**
     * @ORM\Column(name="InvoiceDate", type="datetime")
     */
    private ?\DateTimeInterface $invoiceDate;

    /**
     * @ORM\Column(name="BillingAddress", type="string", length=70)
     */
    private ?string $billingAddress = null;

    /**
     * @ORM\Column(name="BillingCity", type="string", length=40)
     */
    private ?string $billingCity = null;

    /**
     * @ORM\Column(name="BillingState", type="string", length=40)
     */
    private ?string $billingState = null;

    /**
     * @ORM\Column(name="BillingCountry", type="string", length=40)
     */
    private ?string $billingCountry = null;

    /**
     * @ORM\Column(name="BillingPostalCode", type="string", length=10)
     */
    private ?string $billingPostalCode = null;

    /**
     * @ORM\Column(name="Total", type="decimal", precision=10, scale=2)
     */
    private float $total;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InvoiceLine", mappedBy="invoice")
     */
    private Collection $lines;

    public function __construct()
    {
        $this->lines = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(?\DateTimeInterface $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    public function getBillingAddress(): ?string
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?string $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getBillingCity(): ?string
    {
        return $this->billingCity;
    }

    public function setBillingCity(?string $billingCity): self
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    public function getBillingState(): ?string
    {
        return $this->billingState;
    }

    public function setBillingState(?string $billingState): self
    {
        $this->billingState = $billingState;

        return $this;
    }

    public function getBillingCountry(): ?string
    {
        return $this->billingCountry;
    }

    public function setBillingCountry(?string $billingCountry): self
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    public function getBillingPostalCode(): ?string
    {
        return $this->billingPostalCode;
    }

    public function setBillingPostalCode(?string $billingPostalCode): self
    {
        $this->billingPostalCode = $billingPostalCode;

        return $this;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getLines()
    {
        return $this->lines;
    }
}
