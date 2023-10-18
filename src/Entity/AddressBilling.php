<?php

namespace App\Entity;

use App\Repository\AddressBillingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressBillingRepository::class)]
class AddressBilling
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address_line1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address_line2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(nullable: true)]
    private ?int $zipcode = null;

    #[ORM\Column(nullable: true)]
    private ?int $phone = null;

    #[ORM\OneToOne(mappedBy: 'addressBilling', cascade: ['persist', 'remove'])]
    private ?Order $orderAddressBilling = null;

    #[ORM\ManyToOne(inversedBy: 'addressBilling')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddressLine1(): ?string
    {
        return $this->address_line1;
    }

    public function setAddressLine1(?string $adress_line1): static
    {
        $this->address_line1 = $adress_line1;

        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->address_line2;
    }

    public function setAddressLine2(?string $address_line2): static
    {
        $this->address_line2 = $address_line2;

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

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getOrderAddressBilling(): ?Order
    {
        return $this->orderAddressBilling;
    }

    public function setOrderAddressBilling(?Order $orderAddressBilling): static
    {
        // unset the owning side of the relation if necessary
        if ($orderAddressBilling === null && $this->orderAddressBilling !== null) {
            $this->orderAddressBilling->setAddressBilling(null);
        }

        // set the owning side of the relation if necessary
        if ($orderAddressBilling !== null && $orderAddressBilling->getAddressBilling() !== $this) {
            $orderAddressBilling->setAddressBilling($this);
        }

        $this->orderAddressBilling = $orderAddressBilling;

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
}
