<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plan
 *
 * @ORM\Table(name="plan", indexes={@ORM\Index(name="fkIdx_76", columns={"idChantier"})})
 * @ORM\Entity(repositoryClass="App\Repository\PlanRepository")
 */
class Plan
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPlan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idplan;

    /**
     * @var float
     *
     * @ORM\Column(name="tailleX", type="float", precision=10, scale=0, nullable=false)
     */
    private $taillex;

    /**
     * @var float
     *
     * @ORM\Column(name="tailleY", type="float", precision=10, scale=0, nullable=false)
     */
    private $tailley;

    /**
     * @var int
     *
     * @ORM\Column(name="nbEtage", type="integer", nullable=false)
     */
    private $nbetage;

    /**
     * @var int
     *
     * @ORM\Column(name="idChantier", type="integer", nullable=false)
     */
    private $idchantier;

    /**
     * @ORM\Column(name="refPlan", type="string", length=255)
     */
    private $refPlan;

    public function getRefPlan(): ?string
    {
        return $this->refPlan;
    }

    public function setRefPlan(string $refPlan): self
    {
        $this->refPlan = $refPlan;

        return $this;
    }

    public function getIdplan(): ?int
    {
        return $this->idplan;
    }

    public function getTaillex(): ?float
    {
        return $this->taillex;
    }

    public function setTaillex(float $taillex): self
    {
        $this->taillex = $taillex;

        return $this;
    }

    public function getTailley(): ?float
    {
        return $this->tailley;
    }

    public function setTailley(float $tailley): self
    {
        $this->tailley = $tailley;

        return $this;
    }

    public function getNbetage(): ?int
    {
        return $this->nbetage;
    }

    public function setNbetage(int $nbetage): self
    {
        $this->nbetage = $nbetage;

        return $this;
    }

    public function getIdchantier(): ?int
    {
        return $this->idchantier;
    }

    public function setIdchantier(int $idchantier): self
    {
        $this->idchantier = $idchantier;

        return $this;
    }


}
