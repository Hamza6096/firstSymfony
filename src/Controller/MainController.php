<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(CountryRepository $countryRepository, ContinentRepository $continentRepository ): Response
    {
        return $this->render('main/index.html.twig', [
            'countries' => $countryRepository->findAll(),
            'continents' => $continentRepository->findAll()
        ]);
    }

    #[Route('/single/{id}', name: 'single', methods: ['GET'])]
    public function single(CountryRepository $countries, ContinentRepository $continents, Continent $cont ): Response
    {
        $continent = $continents->findAll();
        return $this->render('main/singleContinent.html.twig', [
            'cont' =>$cont,
            'countries' => $countries->findAll(),
            'continents' => $continents->findAll(),
        ]);
    }
}
