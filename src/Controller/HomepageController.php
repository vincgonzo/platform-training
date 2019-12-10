<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlatformTrainingSessionRepository as TrainingSessionsRepo;

class HomepageController extends AbstractController
{
    private $repo;

    public function __construct(TrainingSessionsRepo $repo)
    {
        $this->tSessions = $repo;
    }
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $trainingSessions = $this->tSessions->findAll();
        
        return $this->render('homepage.html.twig', [
            'training_sessions' => $trainingSessions,
            'controller_name' => 'Home',
        ]);
    }
}
  