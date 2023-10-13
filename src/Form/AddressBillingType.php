<?php

namespace App\Form;

use App\Entity\AddressBilling;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressBillingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('address_line1')
            ->add('address_line2')
            ->add('city')
            ->add('zipcode')
            ->add('phone')
            ->add('country')
            ->add('orderAddressBilling')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AddressBilling::class,
        ]);
    }
}
