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
