<?php

namespace App\Entity;

use App\Repository\PaymentMethodRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentMethodRepository::class)]
class PaymentMethod
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'payment_method', cascade: ['persist', 'remove'])]
    private ?Order $orderPaymentMethod = null;

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

    public function getOrderPaymentMethod(): ?Order
    {
        return $this->orderPaymentMethod;
    }

    public function setOrderPaymentMethod(?Order $orderPaymentMethod): static
    {
        // unset the owning side of the relation if necessary
        if ($orderPaymentMethod === null && $this->orderPaymentMethod !== null) {
            $this->orderPaymentMethod->setPaymentMethod(null);
        }

        // set the owning side of the relation if necessary
        if ($orderPaymentMethod !== null && $orderPaymentMethod->getPaymentMethod() !== $this) {
            $orderPaymentMethod->setPaymentMethod($this);
        }

        $this->orderPaymentMethod = $orderPaymentMethod;

        return $this;
    }
}
