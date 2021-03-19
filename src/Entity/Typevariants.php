<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typevariants
 *
 * @ORM\Table(name="typevariants")
 * @ORM\Entity(repositoryClass="App\Repository\TypevariantRepository")
 */
class Typevariants
{
    /**
     * @var int
     *
     * @ORM\Column(name="idTypesVariant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypesvariant;

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
     * @ORM\Column(name="refTypevariants", type="string", length=255)
     */
    private $refTypevariants;

    public function getRefTypevariants(): ?string
    {
        return $this->refTypevariants;
    }

    public function setRefTypevariants(string $refTypevariants): self
    {
        $this->refTypevariants = $refTypevariants;

        return $this;
    }

    public function getIdtypesvariant(): ?int
    {
        return $this->idtypesvariant;
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


}
