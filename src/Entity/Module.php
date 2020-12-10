<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table(name="module")
 * @ORM\Entity(repositoryClass="App\Repository\ModuleRepository")
 */
class Module
{
    /**
     * @var int
     *
     * @ORM\Column(name="idModule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmodule;

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
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=45, nullable=false)
     */
    private $unite;

    /**
     * @var int
     *
     * @ORM\Column(name="qteUnite", type="integer", nullable=false)
     */
    private $qteunite;

    public function getIdmodule(): ?int
    {
        return $this->idmodule;
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

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(string $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    public function getQteunite(): ?int
    {
        return $this->qteunite;
    }

    public function setQteunite(int $qteunite): self
    {
        $this->qteunite = $qteunite;

        return $this;
    }


}
