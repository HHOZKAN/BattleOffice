<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $product = null;

    #[ORM\OneToOne(inversedBy: 'orderPaymentMethod', cascade: ['persist', 'remove'])]
    private ?PaymentMethod $payment_method = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?Client $client = null;

    #[ORM\OneToOne(inversedBy: 'orderAddressBilling', cascade: ['persist', 'remove'])]
    private ?AddressBilling $addressBilling = null;

    #[ORM\OneToOne(inversedBy: 'orderAddressShipping', cascade: ['persist', 'remove'])]
    private ?AddressShipping $addressshipping = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(?string $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getPaymentMethod(): ?PaymentMethod
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(?PaymentMethod $payment_method): static
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getAddressBilling(): ?AddressBilling
    {
        return $this->addressBilling;
    }

    public function setAddressBilling(?AddressBilling $addressBilling): static
    {
        $this->addressBilling = $addressBilling;

        return $this;
    }

    public function getAddressshipping(): ?AddressShipping
    {
        return $this->addressshipping;
    }

    public function setAddressshipping(?AddressShipping $addressshipping): static
    {
        $this->addressshipping = $addressshipping;

        return $this;
    }
}
