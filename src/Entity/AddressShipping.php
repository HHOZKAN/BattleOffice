<?php

namespace App\Entity;

use App\Repository\AddressShippingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressShippingRepository::class)]
class AddressShipping
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address_line1 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(nullable: true)]
    private ?int $zipcode = null;

    #[ORM\OneToOne(inversedBy: 'addressShipping', cascade: ['persist', 'remove'])]
    private ?Country $country = null;

    #[ORM\Column(nullable: true)]
    private ?int $phone = null;

    #[ORM\OneToOne(mappedBy: 'addressshipping', cascade: ['persist', 'remove'])]
    private ?Order $orderAddressShipping = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $lastname = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddressLine1(): ?string
    {
        return $this->address_line1;
    }

    public function setAddressLine1(?string $address_line1): static
    {
        $this->address_line1 = $address_line1;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(?int $zipcode): static
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getOrderAddressShipping(): ?Order
    {
        return $this->orderAddressShipping;
    }

    public function setOrderAddressShipping(?Order $orderAddressShipping): static
    {
        // unset the owning side of the relation if necessary
        if ($orderAddressShipping === null && $this->orderAddressShipping !== null) {
            $this->orderAddressShipping->setAddressshipping(null);
        }

        // set the owning side of the relation if necessary
        if ($orderAddressShipping !== null && $orderAddressShipping->getAddressshipping() !== $this) {
            $orderAddressShipping->setAddressshipping($this);
        }

        $this->orderAddressShipping = $orderAddressShipping;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }
}
