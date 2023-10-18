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

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: AddressBilling::class)]
    private Collection $addressBilling;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: AddressShipping::class)]
    private Collection $addressShipping;

    public function __construct()
    {
        $this->addressBilling = new ArrayCollection();
        $this->addressShipping = new ArrayCollection();
    }



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

    /**
     * @return Collection<int, AddressBilling>
     */
    public function getAddressBilling(): Collection
    {
        return $this->addressBilling;
    }

    public function addAddressBilling(AddressBilling $addressBilling): static
    {
        if (!$this->addressBilling->contains($addressBilling)) {
            $this->addressBilling->add($addressBilling);
            $addressBilling->setCountry($this);
        }

        return $this;
    }

    public function removeAddressBilling(AddressBilling $addressBilling): static
    {
        if ($this->addressBilling->removeElement($addressBilling)) {
            // set the owning side to null (unless already changed)
            if ($addressBilling->getCountry() === $this) {
                $addressBilling->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AddressShipping>
     */
    public function getAddressShipping(): Collection
    {
        return $this->addressShipping;
    }

    public function addAddressShipping(AddressShipping $addressShipping): static
    {
        if (!$this->addressShipping->contains($addressShipping)) {
            $this->addressShipping->add($addressShipping);
            $addressShipping->setCountry($this);
        }

        return $this;
    }

    public function removeAddressShipping(AddressShipping $addressShipping): static
    {
        if ($this->addressShipping->removeElement($addressShipping)) {
            // set the owning side to null (unless already changed)
            if ($addressShipping->getCountry() === $this) {
                $addressShipping->setCountry(null);
            }
        }

        return $this;
    }

}
