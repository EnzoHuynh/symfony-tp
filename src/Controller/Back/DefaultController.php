<?php

namespace App\Controller\Back;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller\Back
 * @Route("/admin", name="app_back_", methods={"GET"})
 * @IsGranted("ROLE_ADMIN")
 */
class DefaultController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="default_home", methods={"GET"})
     */
    public function home()
    {
        return $this->render('Back/Default/home.html.twig');
    }
}