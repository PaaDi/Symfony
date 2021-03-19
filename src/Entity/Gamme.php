<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gamme
 *
 * @ORM\Table(name="gamme")
 * @ORM\Entity(repositoryClass="App\Repository\GammeRepository")
 */
class Gamme
{
    /**
     * @var int
     *
     * @ORM\Column(name="idGamme", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgamme;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="sansAngle", type="string", length=45, nullable=false)
     */
    private $sansangle;

    /**
     * @var string
     *
     * @ORM\Column(name="angleOuvrant", type="string", length=45, nullable=false)
     */
    private $angleouvrant;

    /**
     * @var string
     *
     * @ORM\Column(name="angleFermant", type="string", length=45, nullable=false)
     */
    private $anglefermant;

    /**
     * @ORM\Column(name="refGamme", type="string", length=255)
     */
    private $refGamme;

    public function getRefGamme(): ?string
    {
        return $this->refGamme;
    }

    public function setRefGamme(string $refGamme): self
    {
        $this->refGamme = $refGamme;

        return $this;
    }

    public function getIdgamme(): ?int
    {
        return $this->idgamme;
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

    public function getSansangle(): ?string
    {
        return $this->sansangle;
    }

    public function setSansangle(string $sansangle): self
    {
        $this->sansangle = $sansangle;

        return $this;
    }

    public function getAngleouvrant(): ?string
    {
        return $this->angleouvrant;
    }

    public function setAngleouvrant(string $angleouvrant): self
    {
        $this->angleouvrant = $angleouvrant;

        return $this;
    }

    public function getAnglefermant(): ?string
    {
        return $this->anglefermant;
    }

    public function setAnglefermant(string $anglefermant): self
    {
        $this->anglefermant = $anglefermant;

        return $this;
    }


}
