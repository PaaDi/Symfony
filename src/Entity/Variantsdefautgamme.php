<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Variantsdefautgamme
 *
 * @ORM\Table(name="variantsdefautgamme", indexes={@ORM\Index(name="fkIdx_219", columns={"idVariant"}), @ORM\Index(name="fkIdx_216", columns={"idGamme"})})
 * @ORM\Entity(repositoryClass="App\Repository\VariantDefautGammeRepository")
 */
class Variantsdefautgamme
{
    /**
     * @var int
     *
     * @ORM\Column(name="idVariantsDefautGamme", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvariantsdefautgamme;

    /**
     * @var int
     *
     * @ORM\Column(name="idGamme", type="integer", nullable=false)
     */
    private $idgamme;

    /**
     * @var int
     *
     * @ORM\Column(name="idVariant", type="integer", nullable=false)
     */
    private $idvariant;

    /**
     * @ORM\Column(type="integer")
     */
    private $idTypeVariant;

    public function getIdvariantsdefautgamme(): ?int
    {
        return $this->idvariantsdefautgamme;
    }

    public function getIdgamme(): ?int
    {
        return $this->idgamme;
    }

    public function setIdgamme(int $idgamme): self
    {
        $this->idgamme = $idgamme;

        return $this;
    }

    public function getIdvariant(): ?int
    {
        return $this->idvariant;
    }

    public function setIdvariant(int $idvariant): self
    {
        $this->idvariant = $idvariant;

        return $this;
    }

    public function getIdTypeVariant(): ?int
    {
        return $this->idTypeVariant;
    }

    public function setIdTypeVariant(int $idTypeVariant): self
    {
        $this->idTypeVariant = $idTypeVariant;

        return $this;
    }


}
