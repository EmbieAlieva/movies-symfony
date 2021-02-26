<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=movie::class, inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idcat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getIdcat(): ?movie
    {
        return $this->idcat;
    }

    public function setIdcat(?movie $idcat): self
    {
        $this->idcat = $idcat;

        return $this;
    }
}
