<?php

namespace KeurGuiImmoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ReserverBiensController extends Controller
{

    /**
     * @Route("/reserverBien/{id}")
     */
    public function reserverBienAction(Request $reserverReq,$id){
        $reserv = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository("KeurGuiImmoBundle:Reservation")->find($id);
            $formReserv = $this->createForm(ReservationType::class,$reserv);
       /* if($reserverReq->ismethod('POST')){
            if(isset($_POST['reserver'])){
                return($this->render('KeurGuiImmoBundle:reservationBiens:reserverBien.html.twig'));
            }
        }*/
       return $this->render("KeurGuiImmoBundle:reserverBien.html.twig",
           array("formReserv"=>$formReserv->createView()));
    }
}
