<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlatformTrainingSessionRepository as TrainingSessionRepo;
use App\Repository\UserRepository as UserRepo;

class PlatformTrainingSessionController extends AbstractController
{
    private $trainingRepo;
    private $userRepo;


    public function __construct(
        TrainingSessionRepo $trainingRepo,
        UserRepo $userRepo
        )
    {
        $this->trainingRepo = $trainingRepo;
        $this->userRepo = $userRepo;
    }
    /**
     * @Route("/training/session/{id}", name="training_session")
     */
    public function index($id)
    {
        $trainingInfos = $this->trainingRepo->find($id);
        $trainerInfos = $this->userRepo->find($trainingInfos->getTrainer()->getId());
        //dump($trainingInfos->getSubscribersTrainee());

        return $this->render('platform_training_session/index.html.twig', [
            'training' => $trainingInfos,
            'trainer' => $trainerInfos,
            'controller_name' => 'PlatformTrainingSessionController',
        ]);
    }
}
