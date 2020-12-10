<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Variants
 *
 * @ORM\Table(name="variants", indexes={@ORM\Index(name="fkIdx_210", columns={"idComposant"}), @ORM\Index(name="fkIdx_114", columns={"idTypesVariant"})})
 * @ORM\Entity(repositoryClass="App\Repository\VariantsRepository")
 */
class Variants
{
    /**
     * @var int
     *
     * @ORM\Column(name="idVariant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvariant;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="idTypesVariant", type="integer", nullable=false)
     */
    private $idtypesvariant;

    /**
     * @var int
     *
     * @ORM\Column(name="idComposant", type="integer", nullable=false)
     */
    private $idcomposant;

    public function getIdvariant(): ?int
    {
        return $this->idvariant;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdtypesvariant(): ?int
    {
        return $this->idtypesvariant;
    }

    public function setIdtypesvariant(int $idtypesvariant): self
    {
        $this->idtypesvariant = $idtypesvariant;

        return $this;
    }

    public function getIdcomposant(): ?int
    {
        return $this->idcomposant;
    }

    public function setIdcomposant(int $idcomposant): self
    {
        $this->idcomposant = $idcomposant;

        return $this;
    }


}
