<?php

namespace KeurGuiImmoBundle\Controller;

use KeurGuiImmoBundle\Entity\TypeBien;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Typebien controller.
 *
 * @Route("typebien")
 */
class TypeBienController extends Controller
{
    /**
     * Lists all typeBien entities.
     *
     * @Route("/", name="typebien_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeBiens = $em->getRepository('KeurGuiImmoBundle:TypeBien')->findAll();

        return $this->render('typebien/index.html.twig', array(
            'typeBiens' => $typeBiens,
        ));
    }

    /**
     * Finds and displays a typeBien entity.
     *
     * @Route("/{id}", name="typebien_show")
     * @Method("GET")
     */
    public function showAction(TypeBien $typeBien)
    {

        return $this->render('typebien/show.html.twig', array(
            'typeBien' => $typeBien,
        ));
    }
}
