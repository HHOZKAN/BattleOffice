<?php

namespace App\Form;

use App\Entity\AddressShipping;
use App\Entity\Country;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            'label' => 'Prénom',
            'required' => false

        ])

        ->add('lastname', TextType::class, [
            'label' => 'Nom',
            'required' => false

        ])
            ->add('address_line1', TextType::class, [
                'label' => 'Adresse',
                'required' => false
            ])
            ->add('address_line2', TextType::class, [
                'label' => 'Complément d\'adresse',
                'required' => false

            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'required' => false
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'Code postal',
                'required' => false
            ])
            ->add('phone', TelType::class, [
                'label' => 'Numéro de téléphone',
                'required' => false
            ])
            ->add('country', EntityType::class, [
                'class' => Country::class, // Indiquez l'entité de pays
                'choice_label' => 'name', // Le champ de l'entité à afficher dans le formulaire
                'label' => 'Pays',
                'required' => false
            ]);
           
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AddressShipping::class,
        ]);
    }
}
