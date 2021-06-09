<?php

namespace App\Entity;

use App\Repository\FamilyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamilyRepository::class)
 */
class Family
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity=SocialCategory::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $socialCategory;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numberMember;

    /**
     * @ORM\Column(type="smallint")
     */
    private $qtl;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSocialCategory(): ?socialCategory
    {
        return $this->socialCategory;
    }

    public function setSocialCategory(?socialCategory $socialCategory): self
    {
        $this->socialCategory = $socialCategory;

        return $this;
    }

    public function getNumberMember(): ?int
    {
        return $this->numberMember;
    }

    public function setNumberMember(int $numberMember): self
    {
        $this->numberMember = $numberMember;

        return $this;
    }

    public function getQtl(): ?int
    {
        return $this->qtl;
    }

    public function setQtl(int $qtl): self
    {
        $this->qtl = $qtl;

        return $this;
    }

    public function getIdUser(): ?user
    {
        return $this->idUser;
    }

    public function setIdUser(user $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
