<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=84)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Category", cascade={"persist", "remove"})
     */
    private $headCategory_id;

    public function getId()
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHeadCategoryId(): ?self
    {
        return $this->headCategory_id;
    }

    public function setHeadCategoryId(?self $headCategory_id): self
    {
        $this->headCategory_id = $headCategory_id;

        return $this;
    }
}
