<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Entity\Couleur;
use App\Entity\Taille;
use App\Entity\MoyenPaiement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');

        $couleurs = ["Beige","Blanc","Bleu","Gris","Jaune","Kaki","Marron","Noir","Orange","Rose","Rouge","Vert","Violet"];
        $couleursPersist = [];

        for ($i = 0; $i<= count($couleurs) - 1 ; $i++) :
            $couleur = new Couleur();
            $couleur->setValeur($couleurs[$i]);
            $couleursPersist[] = $couleur;
            $manager->persist($couleur);
        endfor;

        $tailles = ['2XS','S','M','L','XL','2XL','3XL'];
        $taillesPersist = [];

        for ($j = 0; $j<= count($tailles) - 1 ; $j++) :
            $taille = new Taille();
            $taille->setValeur($tailles[$j]);
            $taillesPersist[] = $taille;
            $manager->persist($taille);
        endfor;

        $moyenpaiements = ['Carte bancaire','Chèque','Virement','Prélèvement'];
        $moyenpaiementsPersist = [];

        for ($k = 0; $k<= count($moyenpaiements) - 1 ; $k++) :
            $moyenpaiement = new MoyenPaiement();
            $moyenpaiement->setValeur($moyenpaiements[$k]);
            $moyenpaiementsPersist[] = $moyenpaiement;
            $manager->persist($moyenpaiement);
        endfor;

        for($l=0 ; $l<= 30 ; $l++):
            $produit = new Produit();

            $produit->setNom($faker->sentence())
            ->setImage($faker->imageUrl())
            ->setPrix($faker->randomFloat(2,5,50))
            ->setDescription($faker->paragraph())
            ->setOnline($faker->randomElement(['0','1']));

            for($n=0 ; $n < mt_rand(1, 8); $n++) :
                $produit->addCouleur($couleursPersist[array_rand($couleursPersist)]);
            endfor;  
            
            for($q=0 ; $q < count($tailles) - 1 ; $q++) :
                $produit->addTaille($taillesPersist[array_rand($taillesPersist)]);
            endfor; 
            
            for($p=0 ; $p < count($moyenpaiements) - 1 ; $p++) :
                $produit->addMoyenpaiement($moyenpaiementsPersist[array_rand($moyenpaiementsPersist)]);
            endfor;  

            $manager->persist($produit);
        endfor;

        $manager->flush();
    }
}
