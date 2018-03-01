<?php

namespace KeurGuiImmoBundle\Controller;

use KeurGuiImmoBundle\Entity\TypeBien;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Typebien controller.
 *
 * @Route("/")
 */
class TypeBienController extends Controller
{
    /**
     * Lists all typeBien entities.
     *
     * @Route("/index")
     */
    public function indexAction()
    {
        return $this->render('KeurGuiImmoBundle:admin:admin.html.twig');
    }

}
