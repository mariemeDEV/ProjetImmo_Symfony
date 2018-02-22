<?php

namespace KeurGuiImmoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use KeurGuiImmoBundle\KeurGuiImmoBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
            $biens = $biensRep->findAll();

            if ($chercherReq->ismethod('POST')) {

                if (isset($_POST['cherche']) && $_POST['localiteBien']!="localités" && $_POST['typeBien']!="Types") {
                    $biens = $biensRep->chercherBien($_POST['localiteBien'], $_POST['typeBien'], $_POST['price']);
                }

            }
            return $this->render('KeurGuiImmoBundle:rechercheBiens:catalogue.html.twig',
                array("Localites" => $localites, "Types" => $typesBien, "Biens" => $biens));
        }

    /**
     * @Route("/reservationBiens/reserverBien")
     */
    public function reserverBienAction(Request $reserverReq){
       /* $reserv = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository("KeurGuiImmoBundle:Reservation")->findAll();*/
        return $this->render("KeurGuiImmoBundle:Details:details.html.twig");
    }


    /**
     * @Route("/listes/listeBiens")
     *
     */
    public function listeBiensAction(){
        $listeBiensRep = $this->getDoctrine()->getManager()->getRepository('KeurGuiImmoBundle:Bien');
        $listeBiens = $listeBiensRep->findAll();
        return $this->render('KeurGuiImmoBundle:listes:listeBiens.html.twig',array("listeBiens"=>$listeBiens));
    }

    /**
     * @Route("/listes/listeReservations")
     *
     */
    public function listeReservationsAction(){
       /* $listeReservRep = $this->getDoctrine()->getManager()->getRepository('KeurGuiImmoBundle:Reservation');
        $listeReserv = $listeReservRep->findAll();*/
        return $this->render('KeurGuiImmoBundle:listes:listeReservations.html.twig');
    }
}
