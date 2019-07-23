<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstadoRepository")
 */
class Estado
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Automovil", mappedBy="estado")
     */
    private $automoviles;

    public function __construct()
    {
        $this->automoviles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Automovil[]
     */
    public function getAutomoviles(): Collection
    {
        return $this->automoviles;
    }

    public function addAutomovile(Automovil $automovile): self
    {
        if (!$this->automoviles->contains($automovile)) {
            $this->automoviles[] = $automovile;
            $automovile->setEstado($this);
        }

        return $this;
    }

    public function removeAutomovile(Automovil $automovile): self
    {
        if ($this->automoviles->contains($automovile)) {
            $this->automoviles->removeElement($automovile);
            // set the owning side to null (unless already changed)
            if ($automovile->getEstado() === $this) {
                $automovile->setEstado(null);
            }
        }

        return $this;
    }
}
