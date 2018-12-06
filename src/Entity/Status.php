<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 */
class Status
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_EN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_HU;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="status")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescriptionEN(): ?string
    {
        return $this->description_EN;
    }

    public function setDescriptionEN(string $description_EN): self
    {
        $this->description_EN = $description_EN;

        return $this;
    }

    public function getDescriptionHU(): ?string
    {
        return $this->description_HU;
    }

    public function setDescriptionHU(string $description_HU): self
    {
        $this->description_HU = $description_HU;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setStatus($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getStatus() === $this) {
                $product->setStatus(null);
            }
        }

        return $this;
    }
}
