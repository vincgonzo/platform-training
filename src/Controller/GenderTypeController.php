<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GenderTypeController extends AbstractController
{
    /**
     * @Route("/gender/type", name="gender_type")
     */
    public function index()
    {
        return $this->render('gender_type/index.html.twig', [
            'controller_name' => 'GenderTypeController',
        ]);
    }
}
