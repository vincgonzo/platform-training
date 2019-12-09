<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
            $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $listNames = array(
            array('Alexandre', 'legrand'), 
            array('Marine', 'lepen'), 
            array('Anna', 'harrendt'), 
            array('Jean-louis', 'perron'), 
            array('Vincent', 'lindon'), 
            array('Paul', 'eluar'), 
            array('Louise', 'michelle')
        );

        foreach ($listNames as $name) {
        // On crée l'utilisateur
        $user = new User;
        
        // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
        $user->setName($name[0]);
        $user->setFirstName($name[1]);
        
        $user->setEmail(strtolower($name)."@protonmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
           strtolower($name[0]) . '123'
        ));


        // On définit uniquement le role ROLE_USER qui est le role de base
        if($name == 'Paul' || $name == 'Anna')
        {
            $user->setRoles(array('ROLE_FORMATOR'));
        }else if($name == 'Vincent'){
            $user->setRoles(array('ROLE_ADMIN'));
        }else{
            $user->setRoles(array('ROLE_USER'));
        }

        // On le persiste
        $manager->persist($user);
        }

        $manager->flush();
    }
}
