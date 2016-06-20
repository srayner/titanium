<?php

namespace Titanium\Controller;

use Zend\View\Model\ViewModel;

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
        // Create a new form.
        $form = $this->getServiceLocator()->get('Titanium\PlantForm');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new priority object.
            $plant = $this->getServiceLocator()->get('Titanium\Plant');
            $form->bind($plant);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist plant.
            	$this->service->persist($plant);
                
            	// Redirect to list of plants
		return $this->redirect()->toRoute('titanium/default', array(
		    'controller' => 'plant',
                    'action'     => 'index'
		));
            }
        } 
        
        // If not a POST request, or invalid data, then just render the form.
        return new ViewModel(array(
            'form'   => $form
        ));
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