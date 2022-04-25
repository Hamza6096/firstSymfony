<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $inhabitants;

    #[ORM\Column(type: 'string', length: 255)]
    private $Capital;

    #[ORM\OneToOne(mappedBy: 'ContriesList', targetEntity: Continent::class, cascade: ['persist', 'remove'])]
    private $continent;

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

    public function getInhabitants(): ?int
    {
        return $this->inhabitants;
    }

    public function setInhabitants(int $inhabitants): self
    {
        $this->inhabitants = $inhabitants;

        return $this;
    }

    public function getCapital(): ?string
    {
        return $this->Capital;
    }

    public function setCapital(string $Capital): self
    {
        $this->Capital = $Capital;

        return $this;
    }

    public function getContinent(): ?Continent
    {
        return $this->continent;
    }

    public function setContinent(?Continent $continent): self
    {
        // unset the owning side of the relation if necessary
        if ($continent === null && $this->continent !== null) {
            $this->continent->setContriesList(null);
        }

        // set the owning side of the relation if necessary
        if ($continent !== null && $continent->getContriesList() !== $this) {
            $continent->setContriesList($this);
        }

        $this->continent = $continent;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
