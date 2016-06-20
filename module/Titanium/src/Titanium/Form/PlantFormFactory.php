<?php

namespace Titanium\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class PlantFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $form = new PlantForm();
        $form->setInputFilter(new PlantFilter());
        $form->setHydrator(new DoctrineHydrator($entityManager));
        return $form;
    }   
}