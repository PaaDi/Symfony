<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclient;

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
     * @var bool
     *
     * @ORM\Column(name="estProfessionnel", type="boolean", nullable=false)
     */
    private $estprofessionnel;

    /**
     * @var string
     *
     * @ORM\Column(name="secteurActivite", type="string", length=45, nullable=false)
     */
    private $secteuractivite;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=45, nullable=false)
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="codePostal", type="integer", nullable=false)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=150, nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(name="refClient", type="string", length=255)
     */
    private $refClient;
    
    public function getRefClient(): ?string
    {
        return $this->refClient;
    }

    public function setRefClient(string $refClient): self
    {
        $this->refClient = $refClient;

        return $this;
    }
    

    public function getIdclient(): ?int
    {
        return $this->idclient;
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

    public function getEstprofessionnel(): ?bool
    {
        return $this->estprofessionnel;
    }

    public function setEstprofessionnel(bool $estprofessionnel): self
    {
        $this->estprofessionnel = $estprofessionnel;

        return $this;
    }

    public function getSecteuractivite(): ?string
    {
        return $this->secteuractivite;
    }

    public function setSecteuractivite(string $secteuractivite): self
    {
        $this->secteuractivite = $secteuractivite;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodepostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodepostal(int $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
