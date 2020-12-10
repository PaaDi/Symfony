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
     * @var int
     *
     * @ORM\Column(name="Quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var float
     *
     * @ORM\Column(name="PosX", type="float", precision=10, scale=0, nullable=false)
     */
    private $posx;

    /**
     * @var float
     *
     * @ORM\Column(name="PosY", type="float", precision=10, scale=0, nullable=false)
     */
    private $posy;

    /**
     * @var float
     *
     * @ORM\Column(name="EpaisseurX", type="float", precision=10, scale=0, nullable=false)
     */
    private $epaisseurx;

    /**
     * @var float
     *
     * @ORM\Column(name="EpaisseurY", type="float", precision=10, scale=0, nullable=false)
     */
    private $epaisseury;

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

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPosx(): ?float
    {
        return $this->posx;
    }

    public function setPosx(float $posx): self
    {
        $this->posx = $posx;

        return $this;
    }

    public function getPosy(): ?float
    {
        return $this->posy;
    }

    public function setPosy(float $posy): self
    {
        $this->posy = $posy;

        return $this;
    }

    public function getEpaisseurx(): ?float
    {
        return $this->epaisseurx;
    }

    public function setEpaisseurx(float $epaisseurx): self
    {
        $this->epaisseurx = $epaisseurx;

        return $this;
    }

    public function getEpaisseury(): ?float
    {
        return $this->epaisseury;
    }

    public function setEpaisseury(float $epaisseury): self
    {
        $this->epaisseury = $epaisseury;

        return $this;
    }


}
