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
            ->add('country', EntityType::class, [
                'class' => Country::class, // Indiquez l'entité de pays
                'choice_label' => 'name', // Le champ de l'entité à afficher dans le formulaire
                'label' => 'Pays'
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
