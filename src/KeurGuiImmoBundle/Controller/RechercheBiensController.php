<?php

namespace KeurGuiImmoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use KeurGuiImmoBundle\KeurGuiImmoBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Form\AbstractType;
use KeurGuiImmoBundle\Entity\Client;
use KeurGuiImmoBundle\Entity\Bien;
use KeurGuiImmoBundle\Entity\Reservation;
use KeurGuiImmoBundle\Form\ClientType;

class RechercheBiensController extends Controller
{
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
            $biens = $biensRep->findBy(['etatBien'=>0]);

            if ($chercherReq->ismethod('POST')) {

                if (isset($_POST['cherche']) && $_POST['localiteBien']!="localités" && $_POST['typeBien']!="Types") {
                    $biens = $biensRep->chercherBien($_POST['localiteBien'], $_POST['typeBien'], $_POST['price']);
                }

            }
            return $this->render('KeurGuiImmoBundle:rechercheBiens:catalogue.html.twig',
                array("Localites" => $localites, "Types" => $typesBien, "Biens" => $biens));
        }

    /**
     * @Route("/reservationBiens/reserverBien/{id}",name="reserverBien")
     */
    public function reserverBienAction(Request $reserverReq,$id){
      $bienChosen = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository("KeurGuiImmoBundle:Bien")->find($id);

        $reservataire = new Client();
        $reservation  = new Reservation();
        $formReservationBien = $this->createForm(ClientType::class,$reservataire);
        $em = $this->getDoctrine()->getManager();

      //Si le client n'esxiste pas,on lui crée un compte et on enregistre en meme temps sa résèrvation
      if($reserverReq->ismethod("POST")) {
          $formReservationBien->handleRequest($reserverReq);
          if($formReservationBien->isValid()){
              $em->persist($reservataire);
              $reservation
                  ->setClient($reservataire)
                  ->setBien($bienChosen)
                  ->setEtat(0)
                  ->setDateReservation(new \DateTime());
              $em->persist($reservation);
              $em->flush();
          }
          //si le client existe deja et essaie de se connecter
          else if(isset($_POST["connexion"])){
              $client = $this
                  ->getDoctrine()
                  ->getManager()
                  ->getRepository("KeurGuiImmoBundle:Client")->findBy(['login'=>$_POST['log'],
                      'motDePasse'=>$_POST['psswd']]);
              if($client){
                  $reservation
                      ->setClient($reservataire)
                      ->setBien($bienChosen)
                      ->setEtat(0)
                      ->setDateReservation(new \DateTime());
                  $em->persist($reservation);
                  $em->flush();

              }
          }
      }
        return $this->render("KeurGuiImmoBundle:Details:details.html.twig",
            array("bienChoisi"=>$bienChosen,"formulaireReservation"=>$formReservationBien->createView()));
    }

}
