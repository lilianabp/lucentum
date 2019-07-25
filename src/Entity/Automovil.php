<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_alta;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_reserva;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_venta;

    /**
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
}