<?php

namespace App\Form;

use App\Entity\AddressShipping;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressShippingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('firstname', TextType::class, [
            'label' => 'Prénom'

        ])

        ->add('lastname', TextType::class, [
            'label' => 'Nom'

        ])
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
                    'choose an option' => null,
                    'France' => 'France',
                    'Belgique' => 'Belgique',
                    'Suisse' => 'Suisse'
                ],
                'label' => 'Pays'
            ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AddressShipping::class,
        ]);
    }
}
