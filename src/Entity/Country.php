<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'country', cascade: ['persist', 'remove'])]
    private ?AddressBilling $addressBilling = null;

    #[ORM\OneToOne(mappedBy: 'country', cascade: ['persist', 'remove'])]
    private ?AddressShipping $addressShipping = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddressBilling(): ?AddressBilling
    {
        return $this->addressBilling;
    }

    public function setAddressBilling(?AddressBilling $addressBilling): static
    {
        // unset the owning side of the relation if necessary
        if ($addressBilling === null && $this->addressBilling !== null) {
            $this->addressBilling->setCountry(null);
        }

        // set the owning side of the relation if necessary
        if ($addressBilling !== null && $addressBilling->getCountry() !== $this) {
            $addressBilling->setCountry($this);
        }

        $this->addressBilling = $addressBilling;

        return $this;
    }

    public function getAddressShipping(): ?AddressShipping
    {
        return $this->addressShipping;
    }

    public function setAddressShipping(?AddressShipping $addressShipping): static
    {
        // unset the owning side of the relation if necessary
        if ($addressShipping === null && $this->addressShipping !== null) {
            $this->addressShipping->setCountry(null);
        }

        // set the owning side of the relation if necessary
        if ($addressShipping !== null && $addressShipping->getCountry() !== $this) {
            $addressShipping->setCountry($this);
        }

        $this->addressShipping = $addressShipping;

        return $this;
    }

}
