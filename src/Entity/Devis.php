<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table(name="devis", indexes={@ORM\Index(name="fkIdx_58", columns={"idChantier"})})
 * @ORM\Entity(repositoryClass="App\Repository\DevisRepository")
 */
class Devis
{
    /**
     * @var int
     *
     * @ORM\Column(name="idDevis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddevis;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=45, nullable=false)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime", nullable=false)
     */
    private $datecreation;

    /**
     * @var float
     *
     * @ORM\Column(name="remise", type="float", precision=10, scale=0, nullable=false)
     */
    private $remise;

    /**
     * @var float
     *
     * @ORM\Column(name="prixHT", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixht;

    /**
     * @var float
     *
     * @ORM\Column(name="taux_TVA", type="float", precision=10, scale=0, nullable=false)
     */
    private $tauxTva;

    /**
     * @var float
     *
     * @ORM\Column(name="mLineaire", type="float", precision=10, scale=0, nullable=false)
     */
    private $mlineaire;

    /**
     * @var string
     *
     * @ORM\Column(name="document", type="string", length=45, nullable=false)
     */
    private $document;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=45, nullable=false)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="idChantier", type="integer", nullable=false)
     */
    private $idchantier;

    /**
     * @var bool
     *
     * @ORM\Column(name="estPaye", type="boolean", nullable=false)
     */
    private $estpaye;

    /**
     * @ORM\Column(name="refDevis", type="string", length=255)
     */
    private $refDevis;

    /**
     * @ORM\Column(type="integer")
     */
    private $idGamme;

    public function getRefDevis(): ?string
    {
        return $this->refDevis;
    }

    public function setRefDevis(string $refDevis): self
    {
        $this->refDevis = $refDevis;

        return $this;
    }

    public function getIddevis(): ?int
    {
        return $this->iddevis;
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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getRemise(): ?float
    {
        return $this->remise;
    }

    public function setRemise(float $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getPrixht(): ?float
    {
        return $this->prixht;
    }

    public function setPrixht(float $prixht): self
    {
        $this->prixht = $prixht;

        return $this;
    }

    public function getTauxTva(): ?float
    {
        return $this->tauxTva;
    }

    public function setTauxTva(float $tauxTva): self
    {
        $this->tauxTva = $tauxTva;

        return $this;
    }

    public function getMlineaire(): ?float
    {
        return $this->mlineaire;
    }

    public function setMlineaire(float $mlineaire): self
    {
        $this->mlineaire = $mlineaire;

        return $this;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(string $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

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

    public function getEstpaye(): ?bool
    {
        return $this->estpaye;
    }

    public function setEstpaye(bool $estpaye): self
    {
        $this->estpaye = $estpaye;

        return $this;
    }

    public function getIdGamme(): ?int
    {
        return $this->idGamme;
    }

    public function setIdGamme(int $idGamme): self
    {
        $this->idGamme = $idGamme;

        return $this;
    }


}
