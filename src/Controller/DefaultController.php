<?php
namespace App\Controller;

use App\Entity\Champion;
use App\Entity\Location;
use App\Form\ChampionType;
use App\Manager\ChampionManager;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route("/champion/{id}", name : "showchampion")]
    public function getChampion ($id, EntityManagerInterface $doctrine)
    {
        $repository = $doctrine -> getRepository(champion::class);
        $champion = $repository -> find ($id);

        return $this->render("champion/showchampion.html.twig", ["champion" => $champion]);
    }

    #[Route("/champions", name:"getChampions")]
    public function getChampions(EntityManagerInterface $doctrine)
    {
        $repository = $doctrine -> getRepository(champion::class);
        $champions = $repository -> findAll();

        return $this->render("champion/listChampions.html.twig", ["champions" => $champions]);
    }

   #[Route("/new/champion", name:"createChampion")]
   #[IsGranted("ROLE_ADMIN")]
   public function newChampion(Request $request, EntityManagerInterface $doctrine, ChampionManager $manager)
   {
    $form = $this -> createForm (ChampionType::class);
    $form -> handleRequest($request);

    if ($form -> isSubmitted() && $form -> isValid()){
        $champion = $form -> getData();
        $doctrine -> persist($champion);
        $doctrine -> flush();
        $this -> addFlash('succes', 'Campeon creado correctamente');
        return $this -> redirectToRoute('getChampions');
    }
    return $this -> renderForm("champion/newChampion.html.twig", ["championForm" => $form]);
    }

   #[Route("/edit/champion/{id}", name:"editchampion")]
   #[IsGranted("ROLE_ADMIN")]
   public function editchampion(Request $request, EntityManagerInterface $doctrine, $id)
   {
    $repository = $doctrine -> getRepository(Champion::class);
    $champion = $repository -> find ($id);
    $form = $this -> CreateForm (ChampionType::class, $champion);
    $form -> handleRequest($request);
    if ($form -> isSubmitted () && $form -> isValid()){
        $champion = $form -> getData();
        $doctrine -> persist($champion);
        $doctrine -> flush();
        $this -> addFlash('succes', 'Campeon editado correctamente');
        return $this -> redirectToRoute('getChampions');
    }

    return $this -> renderForm("champion/newChampion.html.twig", ["championForm" => $form]);
   }

   #[Route('/remove/champion/{id}', name:'removechampion')]
   #[IsGranted("ROLE_ADMIN")]
    public function removeChampion($id, EntityManagerInterface $doctrine)
    {
        $repository = $doctrine->getRepository(Champion::class);
        $champion = $repository->find($id);

        $doctrine->remove($champion);
        $doctrine->flush();

        $this->addFlash('success', 'Campeón borrado correctamente');
        return $this->redirectToRoute('getChampions');
    }

    #[Route("/insert/location")]
    public function insetLocation (EntityManagerInterface $doctrine)
    {
        $location1 = new Location();
        $location1 -> setName("Aguas Estancadas");
        $location1 -> setImage("https://universe.leagueoflegends.com/images/bilgewater_crest_icon.png");

        $location2 = new Location();
        $location2 -> setName("Ciudad de Bandle ");
        $location2 -> setImage("https://universe.leagueoflegends.com/images/bandle_city_crest_icon.png");

        $location3 = new Location();
        $location3 -> setName("Demacia");
        $location3 -> setImage("https://universe.leagueoflegends.com/images/demacia_crest_icon.png");

        $location4 = new Location();
        $location4 -> setName("El Vacío");
        $location4 -> setImage("https://universe.leagueoflegends.com/images/void_crest_icon.png");

        $location5 = new Location();
        $location5 -> setName("Freljord");
        $location5 -> setImage("https://universe.leagueoflegends.com/images/freljord_crest_icon.png");

        $location6 = new Location();
        $location6 -> setName("Islas de la Sombra");
        $location6 -> setImage("https://universe.leagueoflegends.com/images/shadow_isles_crest_icon.png");

        $location7 = new Location();
        $location7 -> setName("Ixtal");
        $location7 -> setImage("https://universe.leagueoflegends.com/images/ixtal_crest_icon.png");

        $location8 = new Location();
        $location8 -> setName("Jonia");
        $location8 -> setImage("https://universe.leagueoflegends.com/images/iona_crest_icon.png");
        
        $location9 = new Location();
        $location9 -> setName("Noxus");
        $location9 -> setImage("https://universe.leagueoflegends.com/images/noxus_crest_icon.png");

        $location10 = new Location();
        $location10 -> setName("Piltover");
        $location10 -> setImage("https://universe.leagueoflegends.com/images/piltover_crest_icon.png");

        $location11 = new Location();
        $location11 -> setName("Shurima");
        $location11 -> setImage("https://universe.leagueoflegends.com/images/shurima_crest_icon.png");

        $location12 = new Location();
        $location12 -> setName("Targon");
        $location12 -> setImage("https://universe.leagueoflegends.com/images/mt_targon_crest_icon.png");

        $location13 = new Location();
        $location13 -> setName("Zaun");
        $location13 -> setImage("https://universe.leagueoflegends.com/images/zaun_crest_icon.png");

        $location14 = new Location();
        $location14 -> setName("Runaterra");
        $location14 -> setImage("https://universe.leagueoflegends.com/images/default_emblem.png");
   
        $doctrine -> persist ($location1);
        $doctrine -> persist ($location2);
        $doctrine -> persist ($location2);
        $doctrine -> persist ($location3);
        $doctrine -> persist ($location4);
        $doctrine -> persist ($location5);
        $doctrine -> persist ($location6);
        $doctrine -> persist ($location7);
        $doctrine -> persist ($location8);
        $doctrine -> persist ($location9);
        $doctrine -> persist ($location10);
        $doctrine -> persist ($location11);
        $doctrine -> persist ($location12);
        $doctrine -> persist ($location13);
        $doctrine -> persist ($location14);

        $doctrine -> flush();
        
        return new Response ("Localizaciones añadidas correctamente");
    }


    #[Route("/locations", name:"getLocations")]
    public function getLocations(EntityManagerInterface $doctrine)
    {
        $repository = $doctrine -> getRepository(Location::class);
        $locations = $repository -> findAll();

        return $this->render("champion/listLocations.html.twig", ["locations" => $locations]);
    }
}
