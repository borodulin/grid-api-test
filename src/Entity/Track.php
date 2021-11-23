<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TrackRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=TrackRepository::class)
 * @ORM\Table(name="Track")
 */
class Track
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="TrackId", type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(name="Name", type="string", length=200)
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Album")
     * @ORM\JoinColumn(name="AlbumId", referencedColumnName="AlbumId")
     */
    private ?Album $album = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MediaType")
     * @ORM\JoinColumn(name="MediaTypeId", referencedColumnName="MediaTypeId")
     */
    private ?MediaType $mediaType = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre")
     * @ORM\JoinColumn(name="GenreId", referencedColumnName="GenreId")
     */
    private ?Genre $genre = null;

    /**
     * @ORM\Column(name="Composer", type="string", length=220, nullable=true)
     */
    private ?string $composer = null;

    /**
     * @ORM\Column(name="Milliseconds", type="integer")
     */
    private int $milliseconds;

    /**
     * @ORM\Column(name="Bytes", type="integer")
     */
    private int $bytes;

    /**
     * @ORM\Column(name="UnitPrice", type="decimal", precision=10, scale=2)
     */
    private float $unitPrice;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAlbum(): ?Album
    {
        return $this->album;
    }

    public function setAlbum(?Album $album): self
    {
        $this->album = $album;

        return $this;
    }

    public function getMediaType(): ?MediaType
    {
        return $this->mediaType;
    }

    public function setMediaType(?MediaType $mediaType): self
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getComposer(): ?string
    {
        return $this->composer;
    }

    public function setComposer(?string $composer): self
    {
        $this->composer = $composer;

        return $this;
    }

    public function getMilliseconds(): int
    {
        return $this->milliseconds;
    }

    public function setMilliseconds(int $milliseconds): self
    {
        $this->milliseconds = $milliseconds;

        return $this;
    }

    public function getBytes(): int
    {
        return $this->bytes;
    }

    public function setBytes(int $bytes): self
    {
        $this->bytes = $bytes;

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
}
