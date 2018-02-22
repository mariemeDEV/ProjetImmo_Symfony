<?php

namespace KeurGuiImmoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use KeurGuiImmoBundle\Entity\Client;
use KeurGuiImmoBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class chercheController extends Controller
{
    
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
}

