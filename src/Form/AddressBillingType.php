<?php

namespace App\Form;

use App\Entity\AddressBilling;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressBillingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('address_line1', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('address_line2', TextType::class, [
                'label' => 'Complément d\'adresse'
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'Code postal'
            ])
            ->add('phone', TelType::class, [
                'label' => 'Numéro de téléphone'
            ])
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'Choose an option' => null,
                    'France' => 'France',
                    'Belgique' => 'Belgique',
                    'Suisse' => 'Suisse'
                ],
                'label' => 'Pays'
            ])
            // ->add('orderAddressBilling')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AddressBilling::class,
        ]);
    }
}
