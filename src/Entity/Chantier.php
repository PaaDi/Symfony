<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chantier
 *
 * @ORM\Table(name="chantier", indexes={@ORM\Index(name="fkIdx_43", columns={"idUser"}), @ORM\Index(name="fkIdx_40", columns={"idProjet"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChantierRepository")
 */
class Chantier
{
    /**
     * @var int
     *
     * @ORM\Column(name="idChantier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idchantier;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=45, nullable=false)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="idProjet", type="integer", nullable=false)
     */
    private $idprojet;

    /**
     * @var int
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    public function getIdchantier(): ?int
    {
        return $this->idchantier;
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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getIdprojet(): ?int
    {
        return $this->idprojet;
    }

    public function setIdprojet(int $idprojet): self
    {
        $this->idprojet = $idprojet;

        return $this;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(int $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }


}
