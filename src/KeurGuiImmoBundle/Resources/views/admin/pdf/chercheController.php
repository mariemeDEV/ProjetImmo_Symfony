<?php

namespace KeurGuiImmoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use KeurGuiImmoBundle\Entity\Client;
use KeurGuiImmoBundle\Entity\Bien;
use KeurGuiImmoBundle\Entity\typeBien;
use KeurGuiImmoBundle\Entity\Localite;
use KeurGuiImmoBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Dompdf\Options;
use Dompdf\Dompdf;


class chercheController extends Controller
{

    /**
     * @Route("/contrat/pdf")
     */
    public function toPdfAction() {
        // On récupère l'objet à afficher (rien d'inconnu jusque là)
        $objectsRepository = $this->getDoctrine()->getRepository('KeurGuiImmoBundle:Bien');
        $object = $objectsRepository->findAll();        
        // On crée une  instance pour définir les options de notre fichier pdf
        $options = new Options();
        // Pour simplifier l'affichage des images, on autorise dompdf à utiliser 
        // des  url pour les nom de  fichier
        $options->set('isRemoteEnabled', TRUE);
        // On crée une instance de dompdf avec  les options définies
        $dompdf = new Dompdf($options);
        // On demande à Symfony de générer  le code html  correspondant à 
        // notre template, et on stocke ce code dans une variable
        $html = $this->renderView(
          'KeurGuiImmoBundle:chercheController:contratpdf.html.twig', 
          array('object' => $object)
        );
        // On envoie le code html  à notre instance de dompdf
        $dompdf->loadHtml($html);        
        // On demande à dompdf de générer le  pdf
        $dompdf->render();
        // On renvoie  le flux du fichier pdf dans une  Response pour l'utilisateur
        return new Response ($dompdf->stream());
    }

    /**
     * @Route("/affiche/pdf")
     */
    public function afficherAction(){

        return $this->render('KeurGuiImmoBundle:chercheController:contratpdf.html.twig');
    }

    /**
     * @Route("/Client/add")
     */
    public function addAction(Request $Request)
    {
        $client = new Client();
        $formClient = $this->createForm(ClientType::class,$client);
        // pour affecter la class a Client
        if ($Request->isMethod('POST')){
            $formClient->HandleRequest($Request);
            if ($formClient->isValid()){
             $em = $this->getDoctrine()->getManager();
             
             $em ->persist($client);
             $em ->flush();
            }
        }

        return $this->render('KeurGuiImmoBundle:chercheController:add.html.twig', array('form'=>$formClient->createView()));
    }

     /**
     * @Route("/catalogue")
     */
    public function chercherBiensAction(Request $chercherReq)
    {
        $objectManager = $this->getDoctrine()->getManager();

        $localiteRep = $objectManager->getRepository('KeurGuiImmoBundle:Localite');
        $typeBiensRep = $objectManager->getRepository('KeurGuiImmoBundle:TypeBien');
        $biensRep = $objectManager->getRepository('KeurGuiImmoBundle:Bien');

        $localites = $localiteRep->findAll();
        $typesBien = $typeBiensRep->findAll();
        $biens = $biensRep->findAll();

        if ($chercherReq->ismethod('POST')) {
            if (isset($_POST['cherche']) && $_POST['localiteBien']!="localités" && $_POST['typeBien']!="Types") {
                $biens = $biensRep->chercherBien($_POST['localiteBien'], $_POST['typeBien'], $_POST['price']);
            }

        }
        return $this->render('KeurGuiImmoBundle:rechercheBiens:catalogue.html.twig',
            array("Localites" => $localites, "Types" => $typesBien, "Biens" => $biens));
    }


public function reserverBienAction(Request $reserverReq,$id){
    $reserv = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository("KeurGuiImmoBundle:Reservation")->find($id);
    return $this->render("KeurGuiImmoBundle:reservationBiens:reserverBien.html.twig");
}

    /**
     * @Route("/Bien/liste")
     */
    public function listeBiensAction(){
        $listeBiensRep = $this->getDoctrine()->getManager()->getRepository('KeurGuiImmoBundle:Bien');
        $listeBiens = $listeBiensRep->findAll();
        return $this->render('KeurGuiImmoBundle:listes:listeBiens.html.twig',array("listeBiens"=>$listeBiens));
    }
}

