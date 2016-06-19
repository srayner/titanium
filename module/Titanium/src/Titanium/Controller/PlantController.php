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
        return array(
            
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