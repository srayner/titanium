<?php

namespace Titanium\Controller;

class MachineController extends AbstractController
{
    public function indexAction()
    {
        return array(
            'machines' => $this->service->findAll()
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
            'machine' => $this->service->find($id)
        );
    }
}