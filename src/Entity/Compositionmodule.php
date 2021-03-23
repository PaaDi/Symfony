<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compositionmodule
 *
 * @ORM\Table(name="compositionmodule", indexes={@ORM\Index(name="fkIdx_191", columns={"idTypesVariant"}), @ORM\Index(name="fkIdx_202", columns={"idComposant"}), @ORM\Index(name="fkIdx_185", columns={"idModule"})})
 * @ORM\Entity(repositoryClass="App\Repository\CompositionModuleRepository")
 */
class Compositionmodule
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCompositionModule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcompositionmodule;


    /**
     * @var int
     *
     * @ORM\Column(name="idModule", type="integer", nullable=false)
     */
    private $idmodule;
/**
     * @var int
     *
     * @ORM\Column(name="idTypesVariant", type="integer", nullable=true)
     */
    private $idtypesvariant;

    /**
     * @var int
     *
     * @ORM\Column(name="Quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var int
     *
     * @ORM\Column(name="idComposant", type="integer", nullable=true)
     */
    private $idcomposant;

    public function getIdmodule(): ?int
    {
        return $this->idmodule;
    }

    public function setIdmodule(int $idmodule): self
    {
        $this->idmodule = $idmodule;

        return $this;
    }

    public function getIdcompositionmodule(): ?int
    {
        return $this->idcompositionmodule;
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

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

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
