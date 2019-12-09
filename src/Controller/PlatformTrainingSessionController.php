<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlatformTrainingSessionRepository as TrainingSessionRepo;

class PlatformTrainingSessionController extends AbstractController
{
    private $repo;

    public function __construct(TrainingSessionRepo $repo)
    {
        $this->repo = $repo;
    }
    /**
     * @Route("/training/session/{id}", name="training_session")
     */
    public function index($id)
    {
        $trainingInfos = $this->repo->find($id);
        dump($trainingInfos);

        return $this->render('platform_training_session/index.html.twig', [
            'controller_name' => 'PlatformTrainingSessionController',
        ]);
    }
}
