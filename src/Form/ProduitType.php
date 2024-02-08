<?php

namespace App\Form;

use App\Entity\Couleur;
use App\Entity\MoyenPaiement;
use App\Entity\Produit;
use App\Entity\Taille;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix')
            ->add('description')
            ->add('online')
            ->add('image')
            ->add('couleur', EntityType::class, [
                'class' => Couleur::class,
            'choice_label' => 'valeur',
            'multiple' => true,
            'expanded' => true,
            ])
            ->add('taille', EntityType::class, [
                'class' => Taille::class,
            'choice_label' => 'valeur',
            'multiple' => true,
            'expanded' => true,
            ])
            ->add('moyenpaiement', EntityType::class, [
                'class' => MoyenPaiement::class,
            'choice_label' => 'valeur',
            'multiple' => true,
                'expanded' => true,
            ])
            ->add('image', FileType::class, [
                'label' => 'Image t-shirt : ',
                'mapped' => false,
                'required' => false
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
