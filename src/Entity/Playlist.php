<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="Playlist")
 */
class Playlist
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="PlaylistId", type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(name="Name", type="string", length=120)
     */
    private string $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Track")
     * @ORM\JoinTable(name="PlaylistTrack", joinColumns={
     *      @ORM\JoinColumn(name="PlaylistId", referencedColumnName="PlaylistId")
     *  }, inverseJoinColumns={
     *      @ORM\JoinColumn(name="TrackId", referencedColumnName="TrackId")
     *  })
     */
    private Collection $tracks;

    public function __construct()
    {
        $this->tracks = new ArrayCollection();
    }

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

    public function getTracks(): Collection
    {
        return $this->tracks;
    }
}
