<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiementdevis
 *
 * @ORM\Table(name="paiementdevis", indexes={@ORM\Index(name="fkIdx_161", columns={"idDevis"}), @ORM\Index(name="fkIdx_156", columns={"idModalite"})})
 * @ORM\Entity(repositoryClass="App\Repository\PaiementdevisRepository")
 */
class Paiementdevis
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPaiementDevis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpaiementdevis;

    /**
     * @var int
     *
     * @ORM\Column(name="idDevis", type="integer", nullable=false)
     */
    private $iddevis;

    /**
     * @var int
     *
     * @ORM\Column(name="idModalite", type="integer", nullable=false)
     */
    private $idmodalite;

    /**
     * @var float
     *
     * @ORM\Column(name="PourcentageFixe", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentagefixe;

    /**
     * @var bool
     *
     * @ORM\Column(name="estPaye", type="boolean", nullable=false)
     */
    private $estpaye;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateEstime", type="datetime", nullable=false)
     */
    private $dateestime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateReelle", type="datetime", nullable=false)
     */
    private $datereelle;

    /**
     * @var int
     *
     * @ORM\Column(name="Remise", type="integer", nullable=false)
     */
    private $remise;

    public function getIdpaiementdevis(): ?int
    {
        return $this->idpaiementdevis;
    }

    public function getIddevis(): ?int
    {
        return $this->iddevis;
    }

    public function setIddevis(int $iddevis): self
    {
        $this->iddevis = $iddevis;

        return $this;
    }

    public function getIdmodalite(): ?int
    {
        return $this->idmodalite;
    }

    public function setIdmodalite(int $idmodalite): self
    {
        $this->idmodalite = $idmodalite;

        return $this;
    }

    public function getPourcentagefixe(): ?float
    {
        return $this->pourcentagefixe;
    }

    public function setPourcentagefixe(float $pourcentagefixe): self
    {
        $this->pourcentagefixe = $pourcentagefixe;

        return $this;
    }

    public function getEstpaye(): ?bool
    {
        return $this->estpaye;
    }

    public function setEstpaye(bool $estpaye): self
    {
        $this->estpaye = $estpaye;

        return $this;
    }

    public function getDateestime(): ?\DateTimeInterface
    {
        return $this->dateestime;
    }

    public function setDateestime(\DateTimeInterface $dateestime): self
    {
        $this->dateestime = $dateestime;

        return $this;
    }

    public function getDatereelle(): ?\DateTimeInterface
    {
        return $this->datereelle;
    }

    public function setDatereelle(\DateTimeInterface $datereelle): self
    {
        $this->datereelle = $datereelle;

        return $this;
    }

    public function getRemise(): ?int
    {
        return $this->remise;
    }

    public function setRemise(int $remise): self
    {
        $this->remise = $remise;

        return $this;
    }


}
