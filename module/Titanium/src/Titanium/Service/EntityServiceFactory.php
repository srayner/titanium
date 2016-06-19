<?php

/* 
 * An factory class to create a entity service.
 */

namespace Titanium\Service;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EntityServiceFactory implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return (fnmatch('*EntityService*', $requestedName)) ? true : false;  
    }

    /**
     * Creates a service for a specific entity.
     * Example service name 'Cobalt\EntityService\SoftwareTypeService'
     * @param ServiceLocatorInterface $serviceLocator
     * @param type $name
     * @param type $requestedName
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $serviceName = substr($requestedName, strrpos($requestedName, '\\') + 1);
        $entityName = str_replace('Service', '', $serviceName);
        $serviceName = 'Titanium\Service\\' . $serviceName;
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        return new $serviceName($entityManager, 'Titanium\Entity\\' . $entityName);
    }

}
