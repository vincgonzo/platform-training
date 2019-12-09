<?php 
// src/Controller/AdminController.php
namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use App\Entity\User;

class AdminController extends EasyAdminController
{

    public function restockAction()
    {
        // controllers extending the base AdminController get access to the
        // following variables:
        //   $this->request, stores the current request
        //   $this->em, stores the Entity Manager for this Doctrine entity

        // change the properties of the given entity and save the changes
        $id = $this->request->query->get('id');
        $entity = $this->em->getRepository(User::class)->find($id);
        $entity->setStock(100 + $entity->getStock());
        $this->em->flush();

        // redirect to the 'list' view of the given entity ...
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'list',
            'entity' => $this->request->query->get('entity'),
        ));

        // ... or redirect to the 'edit' view of the given entity item
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'edit',
            'id' => $id,
            'entity' => $this->request->query->get('entity'),
        ));
    }
}
