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
            ->add('adresse', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('complAdresse', TextType::class, [
                'label' => 'Complément d\'adresse'
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('codePostal', TextType::class, [
                'label' => 'Code postal'
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Numéro de téléphone'
            ])
            ->add('pays', ChoiceType::class, [
                'choices' => [
                    'choose an option' => null,
                    'France' => 'France',
                    'Belgique' => 'Belgique',
                    'Suisse' => 'Suisse'
                ],
                'label' => 'Pays'
            ])
            // ->add('orderAddressShipping')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AddressShipping::class,
        ]);
    }
}
