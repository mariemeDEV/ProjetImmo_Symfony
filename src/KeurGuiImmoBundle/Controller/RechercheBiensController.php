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
        public function chercherBiensAction(){
            $objectManager = $this->getDoctrine()->getManager();

            $localiteRep   = $objectManager->getRepository('KeurGuiImmoBundle:Localite');
            $typeBiensRep  = $objectManager->getRepository('KeurGuiImmoBundle:TypeBien');
            $biensRep      = $objectManager->getRepository('KeurGuiImmoBundle:Bien');

                $localites = $localiteRep->findAll();
                $typesBien = $typeBiensRep->findAll();
                $biens     = $biensRep->findAll();

            return $this->render('KeurGuiImmoBundle:rechercheBiens:catalogue.html.twig',array
            ('Localites'=>$localites,'Types'=>$typesBien,"Biens"=>$biens));
        }


        /**
         * @Route("/rechercherBien/{id}")
         */
        public function rechercherBienAction(){

        }



}
