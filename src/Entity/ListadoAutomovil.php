<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ListadoAutomovilRepository")
 */
class ListadoAutomovil
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     */
    private $banner;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metatitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metadescription;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBanner(): ?Media
    {
        return $this->banner;
    }

    public function setBanner(?Media $banner): self
    {
        $this->banner = $banner;

        return $this;
    }

    public function getMetatitle(): ?string
    {
        return $this->metatitle;
    }

    public function setMetatitle(?string $metatitle): self
    {
        $this->metatitle = $metatitle;

        return $this;
    }

    public function getMetadescription(): ?string
    {
        return $this->metadescription;
    }

    public function setMetadescription(?string $metadescription): self
    {
        $this->metadescription = $metadescription;

        return $this;
    }

}