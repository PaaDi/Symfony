<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modalitespaiement
 *
 * @ORM\Table(name="modalitespaiement")
 * @ORM\Entity(repositoryClass="App\Repository\ModalitespaiementRepository")
 */
class Modalitespaiement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idModalite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmodalite;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentageDefaut", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentagedefaut;

    /**
     * @var bool
     *
     * @ORM\Column(name="obsolete", type="boolean", nullable=false)
     */
    private $obsolete;

    /**
     * @ORM\Column(name="refModalitespaiement", type="string", length=255)
     */
    private $refModalitespaiement;

    public function getRefModalitespaiement(): ?string
    {
        return $this->refModalitespaiement;
    }

    public function setRefModalitespaiement(string $refModalitespaiement): self
    {
        $this->refModalitespaiement = $refModalitespaiement;

        return $this;
    }

    public function getIdmodalite(): ?int
    {
        return $this->idmodalite;
    }

    public function getPourcentagedefaut(): ?float
    {
        return $this->pourcentagedefaut;
    }

    public function setPourcentagedefaut(float $pourcentagedefaut): self
    {
        $this->pourcentagedefaut = $pourcentagedefaut;

        return $this;
    }

    public function getObsolete(): ?bool
    {
        return $this->obsolete;
    }

    public function setObsolete(bool $obsolete): self
    {
        $this->obsolete = $obsolete;

        return $this;
    }


}
