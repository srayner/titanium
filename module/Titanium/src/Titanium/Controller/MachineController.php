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
        // Create a new form.
        $form = $this->getServiceLocator()->get('Titanium\MachineForm');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new priority object.
            $machine = $this->getServiceLocator()->get('Titanium\Machine');
            $form->bind($machine);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist machine.
            	$this->service->persist($machine);
                
            	// Redirect to list of plants
		return $this->redirect()->toRoute('titanium/default', array(
		    'controller' => 'machine',
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
            'machine' => $this->service->find($id)
        );
    }
}