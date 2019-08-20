<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsletterRepository")
 */
class Newsletter
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
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $legal;

    /**
     * @ORM\Column(type="boolean")
     */
    private $consentimiento;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLegal(): ?bool
    {
        return $this->legal;
    }

    public function setLegal(bool $legal): self
    {
        $this->legal = $legal;

        return $this;
    }

    public function getConsentimiento(): ?bool
    {
        return $this->consentimiento;
    }

    public function setConsentimiento(bool $consentimiento): self
    {
        $this->consentimiento = $consentimiento;

        return $this;
    }
}
