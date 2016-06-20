<?php

namespace Titanium\Controller;

class PlantController extends AbstractController
{
    public function indexAction()
    {
        return array(
            'plants' => $this->service->findAll()
        );
    }
    
    public function addAction()
    {
        $form = $this->getServiceLocator()->get('Titanium\PlantForm');
        return array(
            'form' => $form
        );
    }
    
    public function editAction()
    {
        return array(
            
        );
    }
    
    public function deleteAction()
    {
        return array(
            
        );
    }
    
    public function detailAction()
    {
        return array(
            'plant' => $this->service->find($id)
        );
    }
}