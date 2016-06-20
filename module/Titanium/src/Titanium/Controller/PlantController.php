<?php

namespace Titanium\Controller;

use Zend\View\Model\ViewModel;
use Zend\Session\Container;

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
        // Ensure we have an id, else redirect to add action.
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
             return $this->redirect()->toRoute('titanium/default', array(
                 'controller' => 'plant',
                 'action' => 'add'
             ));
        }
        
        // Grab the priority with the specified id.
        $plant = $this->service->findById($id);
        
        $form = $this->getServiceLocator()->get('Titanium\PlantForm');
        $form->bind($plant);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist plant.
            	$this->service->persist($plant);
                
                // Redirect to original referer
                return $this->redirect()->toUrl($this->retrieveReferer());
            }     
        }
        
        $this->storeReferer('plant/edit');
        
        return new ViewModel(array(
             'id' => $id,
             'form' => $form,
        ));
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
    
    private function storeReferer($except)
    {
        $referer = $this->getRequest()->getHeader('Referer')->uri()->getPath();
        if (strpos($referer, $except) === false) {
            $session = new Container('plant');
            $session->referer = $referer;
        }
    }
    
    private function retrieveReferer()
    {
        $session = new Container('plant');
        $referer = $session->referer;
        return $referer;
    }
}