<?php

namespace App\Entity;

use App\Repository\VariantsDansDevisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VariantsDansDevisRepository::class)
 */
class VariantsDansDevis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idVariantDansDevis;

    /**
     * @ORM\Column(name="idTypevariant", type="integer", nullable=false)
     */
    private $idTypevariant;

    /**
     * @ORM\Column(name="idVariant", type="integer", nullable=false)
     */
    private $idVariant;

    /**
     * @ORM\Column(name="idDevis", type="integer", nullable=false)
     */
    private $idDevis;

    public function getId(): ?int
    {
        return $this->idVariantDansDevis;
    }

    public function getIdTypevariant(): ?int
    {
        return $this->idTypevariant;
    }

    public function setIdTypevariant(int $idTypevariant): self
    {
        $this->idTypevariant = $idTypevariant;

        return $this;
    }

    public function getIdVariant(): ?int
    {
        return $this->idVariant;
    }

    public function setIdVariant(int $idVariant): self
    {
        $this->idVariant = $idVariant;

        return $this;
    }

    public function getIdDevis(): ?int
    {
        return $this->idDevis;
    }

    public function setIdDevis(int $idDevis): self
    {
        $this->idDevis = $idDevis;

        return $this;
    }
}
