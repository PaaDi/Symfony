<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur")
 * @ORM\Entity(repositoryClass="App\Repository\FournisseursRepository")
 */
class Fournisseur
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFournisseur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=45, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="nomContact", type="string", length=45, nullable=false)
     */
    private $nomcontact;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroTel", type="string", length=45, nullable=false)
     */
    private $numerotel;

    /**
     * @ORM\Column(name="refFournisseur", type="string", length=255)
     */
    private $refFournisseur;

    public function getRefFournisseur(): ?string
    {
        return $this->refFournisseur;
    }

    public function setRefFournisseur(string $refFournisseur): self
    {
        $this->refFournisseur = $refFournisseur;

        return $this;
    }

    public function getIdfournisseur(): ?int
    {
        return $this->idfournisseur;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNomcontact(): ?string
    {
        return $this->nomcontact;
    }

    public function setNomcontact(string $nomcontact): self
    {
        $this->nomcontact = $nomcontact;

        return $this;
    }

    public function getNumerotel(): ?string
    {
        return $this->numerotel;
    }

    public function setNumerotel(string $numerotel): self
    {
        $this->numerotel = $numerotel;

        return $this;
    }


}
