<?php

namespace App\Entity;

use App\Repository\FavoriteBrandRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavoriteBrandRepository::class)
 */
class FavoriteBrand
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    /**
     * @ORM\OneToOne(targetEntity=Brand::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $firstFav;

    /**
     * @ORM\OneToOne(targetEntity=Brand::class, cascade={"persist", "remove"})
     */
    private $secondFav;

    /**
     * @ORM\OneToOne(targetEntity=brand::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $thirdFav;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFirstFav(): ?brand
    {
        return $this->firstFav;
    }

    public function setFirstFav(brand $firstFav): self
    {
        $this->firstFav = $firstFav;

        return $this;
    }

    public function getSecondFav(): ?Brand
    {
        return $this->secondFav;
    }

    public function setSecondFav(?Brand $secondFav): self
    {
        $this->secondFav = $secondFav;

        return $this;
    }

    public function getThirdFav(): ?brand
    {
        return $this->thirdFav;
    }

    public function setThirdFav(brand $thirdFav): self
    {
        $this->thirdFav = $thirdFav;

        return $this;
    }
}
