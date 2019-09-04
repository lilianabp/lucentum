<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\GalleryHasMedia;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutomovilRepository")
 */
class Automovil
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marca", inversedBy="automoviles")
     */
    private $marca;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modelo;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio;

    /**
     * @ORM\Column(type="integer")
     */
    private $anio;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometraje;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\Column(type="integer")
     */
    private $plazas;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puertas;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cambio", inversedBy="automovils")
     */
    private $cambio;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Combustible", inversedBy="automoviles")
     */
    private $combustible;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_alta;

    /**
     * @Gedmo\Timestampable(on="change", field="estado.id", value="2")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_reserva;

    /**
     * @Gedmo\Timestampable(on="change", field="estado.id", value="1")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_venta;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_modificacion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Condicion", inversedBy="automoviles")
     */
    private $condicion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Estado", inversedBy="automoviles")
     */
    private $estado;

    /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $imagen_destacada;

    /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     */
    private $video;

    /**
     * @ORM\ManyToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Gallery", cascade={"persist", "remove"})
     */
    private $galeria;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Automovil", inversedBy="relacionados")
     */
    private $automovil;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Automovil", mappedBy="automovil")
     */
    private $relacionados;

    /**
     * @ORM\Column(type="boolean")
     */
    private $destacado;

    /**
     * @ORM\Column(type="boolean")
     */
    private $oferta;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $potencia;

 

    public function __toString() {
        return $this->getMarca().' '.$this->getModelo();
    }

    public function __construct()
    {
        $this->relacionados = new ArrayCollection();
        $this->automovil = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarca(): ?Marca
    {
        return $this->marca;
    }

    public function setMarca(?Marca $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    public function setPrecio(int $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getAnio(): ?int
    {
        return $this->anio;
    }

    public function setAnio(int $anio): self
    {
        $this->anio = $anio;

        return $this;
    }

    public function getKilometraje(): ?int
    {
        return $this->kilometraje;
    }

    public function setKilometraje(int $kilometraje): self
    {
        $this->kilometraje = $kilometraje;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPlazas(): ?int
    {
        return $this->plazas;
    }

    public function setPlazas(int $plazas): self
    {
        $this->plazas = $plazas;

        return $this;
    }

    public function getPuertas(): ?int
    {
        return $this->puertas;
    }

    public function setPuertas(?int $puertas): self
    {
        $this->puertas = $puertas;

        return $this;
    }

    public function getCambio(): ?Cambio
    {
        return $this->cambio;
    }

    public function setCambio(?Cambio $cambio): self
    {
        $this->cambio = $cambio;

        return $this;
    }

    public function getCombustible(): ?Combustible
    {
        return $this->combustible;
    }

    public function setCombustible(?Combustible $combustible): self
    {
        $this->combustible = $combustible;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechaAlta(): ?\DateTimeInterface
    {
        return $this->fecha_alta;
    }

    public function setFechaAlta(?\DateTimeInterface $fecha_alta): self
    {
        $this->fecha_alta = $fecha_alta;

        return $this;
    }

    public function getFechaReserva(): ?\DateTimeInterface
    {
        return $this->fecha_reserva;
    }

    public function setFechaReserva(?\DateTimeInterface $fecha_reserva): self
    {
        $this->fecha_reserva = $fecha_reserva;

        return $this;
    }

    public function getFechaVenta(): ?\DateTimeInterface
    {
        return $this->fecha_venta;
    }

    public function setFechaVenta(?\DateTimeInterface $fecha_venta): self
    {
        $this->fecha_venta = $fecha_venta;

        return $this;
    }

    public function getFechaModificacion(): ?\DateTimeInterface
    {
        return $this->fecha_modificacion;
    }

    public function setFechaModificacion(?\DateTimeInterface $fecha_modificacion): self
    {
        $this->fecha_modificacion = $fecha_modificacion;

        return $this;
    }

    public function getCondicion(): ?Condicion
    {
        return $this->condicion;
    }

    public function setCondicion(?Condicion $condicion): self
    {
        $this->condicion = $condicion;

        return $this;
    }

    public function getEstado(): ?Estado
    {
        return $this->estado;
    }

    public function setEstado(?Estado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getImagenDestacada(): ?Media
    {
        return $this->imagen_destacada;
    }

    public function setImagenDestacada(Media $imagen_destacada): self
    {
        $this->imagen_destacada = $imagen_destacada;

        return $this;
    }

    public function getVideo(): ?Media
    {
        return $this->video;
    }

    public function setVideo(?Media $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getGaleria(): ?Gallery
    {
        return $this->galeria;
    }

    public function setGaleria(?Gallery $galeria): self
    {
        $this->galeria = $galeria;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getAutomovil(): Collection
    {
        return $this->automovil;
    }

    public function addAutomovil(self $automovil): self
    {
        if (!$this->automovil->contains($automovil)) {
            $this->automovil[] = $automovil;
        }

        return $this;
    }

    public function removeAutomovil(self $automovil): self
    {
        if ($this->automovil->contains($automovil)) {
            $this->automovil->removeElement($automovil);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getRelacionados(): Collection
    {
        return $this->relacionados;
    }

    public function addRelacionado(self $relacionado): self
    {
        if (!$this->relacionados->contains($relacionado)) {
            $this->relacionados[] = $relacionado;
            $relacionado->addAutomovil($this);
        }

        return $this;
    }

    public function removeRelacionado(self $relacionado): self
    {
        if ($this->relacionados->contains($relacionado)) {
            $this->relacionados->removeElement($relacionado);
            $relacionado->removeAutomovil($this);
        }

        return $this;
    }

    public function getDestacado(): ?bool
    {
        return $this->destacado;
    }

    public function setDestacado(bool $destacado): self
    {
        $this->destacado = $destacado;

        return $this;
    }

    public function getOferta(): ?bool
    {
        return $this->oferta;
    }

    public function setOferta(bool $oferta): self
    {
        $this->oferta = $oferta;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getPotencia(): ?string
    {
        return $this->potencia;
    }

    public function setPotencia(?string $potencia): self
    {
        $this->potencia = $potencia;

        return $this;
    }

    
}