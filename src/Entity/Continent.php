<?php

namespace App\Entity;

use App\Repository\ContinentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContinentRepository::class)]
class Continent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\OneToOne(inversedBy: 'continent', targetEntity: Country::class, cascade: ['persist', 'remove'])]
    private $ContriesList;

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

    public function getContriesList(): ?country
    {
        return $this->ContriesList;
    }

    public function setContriesList(?country $ContriesList): self
    {
        $this->ContriesList = $ContriesList;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
}
}
