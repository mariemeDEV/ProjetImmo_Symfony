<?php

namespace KeurGuiImmoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Dompdf\Dompdf;
use Dompdf\Options;
use KeurGuiImmoBundle\Entity\Contrat;
use KeurGuiImmoBundle\Entity\Paiement;



class AdminController extends Controller
{

    /**
     * @Route("/admin/biens")
     */
    public function listeBiensAction()
    {
        $listeBiensRep = $this->getDoctrine()->getManager()->getRepository('KeurGuiImmoBundle:Bien');
        $listeBiens = $listeBiensRep->findAll();
        return $this->render('KeurGuiImmoBundle:admin:biens.html.twig', array("listeBiens" => $listeBiens));
    }

    /**
     * @Route("/admin/reservations")
     *
     */
    public function listeReservationsAction()
    {
        $listeReservRep = $this->getDoctrine()->getManager()->getRepository('KeurGuiImmoBundle:Reservation');
        $listeReserv = $listeReservRep->findAll();
        return $this->render('KeurGuiImmoBundle:admin:reservations.html.twig', array
        ("listeReserv" => $listeReserv));
    }

    /**
     * @Route("/contrats/validerContrat/{id}",name="validationContrat")
     */
    public function validerContratAction(Request $pdfReq,$id)
    {
        $bien = $this->getDoctrine()->getManager()->getRepository('KeurGuiImmoBundle:Bien')->find($id);
        $listeReservRep = $this->getDoctrine()->getManager()->getRepository('KeurGuiImmoBundle:Reservation');
        $listeReserv = $listeReservRep->findAll();
        $em=$this->getDoctrine()->getManager();
        $montant=$bien->getPrixLocation();
        $total=2*$montant;
       // echo($total);
    //Execution requete
        if($pdfReq->ismethod("POST")){
            if(isset($_POST["saveContrat"])){
                $contrat = new Contrat();
                $paiement = new Paiement();
//Enregistrer le contrat
               $idBien=$bien->getId();
               $typeBien=$bien->getTypeBien();
               $client=$listeReserv[0]->getClient();

                $contrat->setDateContrat(new \DateTime());
                $contrat->setBien($bien);
                //$contrat->setBien($contrat->getBien());
                $contrat->setClient($client);
                $contrat->setDuree(1);
                $contrat->setCaution($montant);
                $contrat->setEtat("En cours");
                $em->persist($contrat);
               // $em->flush();

                $bien->setEtatBien(1);
               // $em->flush();

                $paiement->setDatePaiement(new \DateTime());
                $paiement->setMontant($montant);
                $paiement->setPeriode(1);
                $paiement->setContrat($contrat);
                $em->persist($paiement);
                //$em->flush();




               // echo($typeBien);
                //$dateContrat=new \DateTime();
                //echo($dateContrat);

//Enregistrer le paiement


 //Génèrer le contrat
              /*  $objectsRepository = $this->getDoctrine()->getRepository('KeurGuiImmoBundle:Bien');
                $object = $objectsRepository->findAll();
                $options = new Options();
                $options->set('isRemoteEnabled', TRUE);
                $dompdf = new Dompdf($options);

                $html = $this->renderView(
                    'KeurGuiImmoBundle:chercheController:contratpdf.html.twig',
                    array('object' => $object)
                );
                $dompdf->loadHtml($html);
                $dompdf->render();
                return new Response ($dompdf->stream());*/
                return $this->render("KeurGuiImmoBundle:contrats:contratpdf.html.twig",array("listeReserv" => $listeReserv));
            }
        }
        return $this->render("KeurGuiImmoBundle:contrats:validerContrat.html.twig", array("bienChoisi" => $bien,
            "listeReserv" => $listeReserv,"total"=>$total));
    }



    /**
     * @Route("/admin")
     */
    public function adminActions()
    {
        return $this->render("KeurGuiImmoBundle:admin:reservations.html.twig");
    }
}
