<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modulesdansplan
 *
 * @ORM\Table(name="modulesdansplan", indexes={@ORM\Index(name="fkIdx_143", columns={"idModule"}), @ORM\Index(name="fkIdx_140", columns={"idPlan"})})
 * @ORM\Entity(repositoryClass="App\Repository\ModuledansplanRepository")
 */
class Modulesdansplan
{
    /**
     * @var int
     *
     * @ORM\Column(name="idModulesDansPlan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmodulesdansplan;

    /**
     * @var int
     *
     * @ORM\Column(name="idPlan", type="integer", nullable=false)
     */
    private $idplan;

    /**
     * @var int
     *
     * @ORM\Column(name="idModule", type="integer", nullable=false)
     */
    private $idmodule;


    /**
     * @var float
     *
     * @ORM\Column(name="PosDebX", type="float", precision=10, scale=0, nullable=false)
     */
    private $posDebX;

    /**
     * @var float
     *
     * @ORM\Column(name="PosDebY", type="float", precision=10, scale=0, nullable=false)
     */
    private $posDebY;

    /**
     * @var float
     *
     * @ORM\Column(name="PosFinX", type="float", precision=10, scale=0, nullable=false)
     */
    private $posFinX;

    /**
     * @var float
     *
     * @ORM\Column(name="PosFinY", type="float", precision=10, scale=0, nullable=false)
     */
    private $posFinY;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Notes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomDansPlan;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Rotation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $VisibleDansPlan;

    public function getIdmodulesdansplan(): ?int
    {
        return $this->idmodulesdansplan;
    }

    public function getIdplan(): ?int
    {
        return $this->idplan;
    }

    public function setIdplan(int $idplan): self
    {
        $this->idplan = $idplan;

        return $this;
    }

    public function getIdmodule(): ?int
    {
        return $this->idmodule;
    }

    public function setIdmodule(int $idmodule): self
    {
        $this->idmodule = $idmodule;

        return $this;
    }

    /**
     * @return float
     */
    public function getPosDebX(): float
    {
        return $this->posDebX;
    }

    /**
     * @param float $posDebX
     */
    public function setPosDebX(float $posDebX): void
    {
        $this->posDebX = $posDebX;
    }

    /**
     * @return float
     */
    public function getPosDebY(): float
    {
        return $this->posDebY;
    }

    /**
     * @param float $posDebY
     */
    public function setPosDebY(float $posDebY): void
    {
        $this->posDebY = $posDebY;
    }

    /**
     * @return float
     */
    public function getPosFinX(): float
    {
        return $this->posFinX;
    }

    /**
     * @param float $posFinX
     */
    public function setPosFinX(float $posFinX): void
    {
        $this->posFinX = $posFinX;
    }

    /**
     * @return float
     */
    public function getPosFinY(): float
    {
        return $this->posFinY;
    }

    /**
     * @param float $posFinY
     */
    public function setPosFinY(float $posFinY): void
    {
        $this->posFinY = $posFinY;
    }

    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    public function setNotes(?string $Notes): self
    {
        $this->Notes = $Notes;

        return $this;
    }

    public function getNomDansPlan(): ?string
    {
        return $this->NomDansPlan;
    }

    public function setNomDansPlan(string $NomDansPlan): self
    {
        $this->NomDansPlan = $NomDansPlan;

        return $this;
    }

    public function getRotation(): ?float
    {
        return $this->Rotation;
    }

    public function setRotation(?float $Rotation): self
    {
        $this->Rotation = $Rotation;

        return $this;
    }

    public function getVisibleDansPlan(): ?bool
    {
        return $this->VisibleDansPlan;
    }

    public function setVisibleDansPlan(bool $VisibleDansPlan): self
    {
        $this->VisibleDansPlan = $VisibleDansPlan;

        return $this;
    }


}
