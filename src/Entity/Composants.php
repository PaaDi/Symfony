<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composants
 *
 * @ORM\Table(name="composants", indexes={@ORM\Index(name="fkIdx_102", columns={"idFournisseur"})})
 * @ORM\Entity(repositoryClass="App\Repository\ComposantsRepository")
 */
class Composants
{
    /**
     * @var int
     *
     * @ORM\Column(name="idComposant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcomposant;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=45, nullable=false)
     */
    private $categorie;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="idFournisseur", type="integer", nullable=false)
     */
    private $idfournisseur;

    public function getIdcomposant(): ?int
    {
        return $this->idcomposant;
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

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdfournisseur(): ?int
    {
        return $this->idfournisseur;
    }

    public function setIdfournisseur(int $idfournisseur): self
    {
        $this->idfournisseur = $idfournisseur;

        return $this;
    }


}
