<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType as UserForm;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    /**
     * @Route("/user/create", name="user_creation")
     */
    public function index(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $_em = $this->getDoctrine()->getManager();
            $_em->persist($user);
            $_em->flush();

            $this->addFlash("success", "User correctly create, ". $user->getName() . ". Welcome !");
            return $this->redirectToRoute('homepage', []);
        }
        
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'form' => $form->createView()
        ]);
    }
}
