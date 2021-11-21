<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="Employee")
 */
class Employee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="EmployeeId", type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(name="FirstName", type="string", length=20)
     */
    private string $firstName;

    /**
     * @ORM\Column(name="LastName", type="string", length=20)
     */
    private string $lastName;

    /**
     * @ORM\Column(name="Title", type="string", length=30)
     */
    private string $title;

    /**
     * @ORM\Column(name="BirthDate", type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $birthDate = null;

    /**
     * @ORM\Column(name="HireDate", type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $hireDate = null;

    /**
     * @ORM\Column(name="Address", type="string", length=70, nullable=true)
     */
    private ?string $address = null;

    /**
     * @ORM\Column(name="City", type="string", length=40, nullable=true)
     */
    private ?string $city = null;

    /**
     * @ORM\Column(name="State", type="string", length=40, nullable=true)
     */
    private ?string $state = null;

    /**
     * @ORM\Column(name="Country", type="string", length=40, nullable=true)
     */
    private ?string $country = null;

    /**
     * @ORM\Column(name="PostalCode", type="string", length=10, nullable=true)
     */
    private ?string $postalCode = null;

    /**
     * @ORM\Column(name="Phone", type="string", length=24, nullable=true)
     */
    private ?string $phone = null;

    /**
     * @ORM\Column(name="Fax", type="string", length=24, nullable=true)
     */
    private ?string $fax = null;

    /**
     * @ORM\Column(name="Email", type="string", length=60)
     */
    private string $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employee")
     * @ORM\JoinColumn(name="ReportsTo")
     */
    private ?Employee $reportsTo = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getHireDate(): ?\DateTimeInterface
    {
        return $this->hireDate;
    }

    public function setHireDate(?\DateTimeInterface $hireDate): self
    {
        $this->hireDate = $hireDate;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getReportsTo(): ?self
    {
        return $this->reportsTo;
    }

    public function setReportsTo(?self $reportsTo): self
    {
        $this->reportsTo = $reportsTo;

        return $this;
    }
}
