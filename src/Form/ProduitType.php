<?php

namespace App\Form;

use App\Entity\Couleur;
use App\Entity\MoyenPaiement;
use App\Entity\Produit;
use App\Entity\Taille;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('taille', EntityType::class, [
                'class' => Taille::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('moyenpaiement', EntityType::class, [
                'class' => MoyenPaiement::class,
'choice_label' => 'id',
'multiple' => true,
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
