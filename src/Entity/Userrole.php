<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userrole
 *
 * @ORM\Table(name="userrole")
 * @ORM\Entity(repositoryClass="App\Repository\UserroleRepository")
 */
class Userrole
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRole", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrole;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=45, nullable=false)
     */
    private $role;

    /**
     * @var bool
     *
     * @ORM\Column(name="estAdmin", type="boolean", nullable=false)
     */
    private $estadmin;

    /**
     * @ORM\Column(name="refuserrole", type="string", length=255)
     */
    private $refuserrole;

    public function getRefuserrole(): ?string
    {
        return $this->refuserrole;
    }

    public function setRefuserrole(string $refuserrole): self
    {
        $this->refuserrole = $refuserrole;

        return $this;
    }

    public function getIdrole(): ?int
    {
        return $this->idrole;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getEstadmin(): ?bool
    {
        return $this->estadmin;
    }

    public function setEstadmin(bool $estadmin): self
    {
        $this->estadmin = $estadmin;

        return $this;
    }


}
