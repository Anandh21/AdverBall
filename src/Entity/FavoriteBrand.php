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
     * @ORM\OneToOne(targetEntity=user::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

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
}
