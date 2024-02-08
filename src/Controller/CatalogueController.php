<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProduitRepository;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Produit;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue')]
    #[Route('/', name: 'app_catalogue')]
    public function index(
        ProduitRepository $produitRepository,
        Request $request,
        PaginatorInterface $paginator
    ): Response
    {
        $produits_pagination = $paginator->paginate(
            $produitRepository->findBy(['online' => '1'], ['prix' => 'ASC']),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('catalogue/index.html.twig', [
            'produits' => $produits_pagination,
        ]);
    }

    // #[Route('/{idProduit}', name: 'app_catalogue_produit', methods: ['GET'])]
    // public function produit(ProduitRepository $produitRepository, int $idProduit): Response
    // {
    //     $produit = $produitRepository->findOneBy($idProduit);

        
        
    //     return $this->render('catalogue/produit.html.twig', [
    //         'produit' => $produit,
    //     ]);
    // }
}
