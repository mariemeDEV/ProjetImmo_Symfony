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
        public function chercherBiensAction(Request $chercherReq){
            $objectManager = $this->getDoctrine()->getManager();

            $localiteRep   = $objectManager->getRepository('KeurGuiImmoBundle:Localite');
            $typeBiensRep  = $objectManager->getRepository('KeurGuiImmoBundle:TypeBien');
            $biensRep      = $objectManager->getRepository('KeurGuiImmoBundle:Bien');

            $localites = $localiteRep->findAll();
            $typesBien = $typeBiensRep->findAll();
            $biens     = $biensRep->findAll();

            if($chercherReq->ismethod('POST')){
                $typesBien = $_POST['typeBien'];
                $localites = $_POST['localiteBien'];
                $prix = $_POST['price'];
                if(isset($_POST['cherche']) && $typesBien!="" && $localites!="" && $prix>=10000){
                echo("ok");
                   return $this->render('KeurGuiImmoBundle:rechercheBiens:catalogue.html.twig',
                        array("Localites"=>$localites,"Types"=>$typesBien,"Prix"=>$prix,"Biens"=>$biens));
                }
            }
            return $this->render('KeurGuiImmoBundle:rechercheBiens:catalogue.html.twig',
                array('Localites'=>$localites,'Types'=>$typesBien,"Biens"=>$biens));
        }






}
