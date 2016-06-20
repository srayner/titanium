<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => Controller\IndexController::class
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    // Navigation
    'navigation' => array(
        'default' => array(
            
            // Manufacturing.
            array(
                'label' => '<i class="fa fa-gears"></i> Manufacturing',
                'route' => 'titanium/default',
                'controller' => 'plant',
                'pages' => array(
                    array(
                        'label' => 'Plants',
                        'controller' => 'plants',
                        'action' => 'index',
                    ),
                    array(
                        'label' => 'Machines',
                        'controller' => 'machines',
                        'action' => 'index',
                    ),
                    array(
                        'label' => 'Production',
                        'controller' => 'production',
                        'action' => 'index',
                    ),
                ),
            ),
            
            // Design.
            array(
                'label' => '<i class="fa fa-pencil-square-o"></i> Design',
                'route' => 'titanium/default',
                'controller' => 'plant',
                'pages' => array(
                    array(
                        'label' => 'Program Nests',
                        'controller' => 'nest',
                        'action' => 'index',
                    ),
                    array(
                        'label' => 'Variants',
                        'controller' => 'variant',
                        'action' => 'index',
                    ),
                ),
            ),
            
            // System.
            array(
                'label' => '<i class="fa fa-pencil-square-o"></i> System',
                'route' => 'titanium/default',
                'controller' => 'user',
                'pages' => array(
                    array(
                        'label' => 'Users',
                        'controller' => 'user',
                        'action' => 'index',
                    ),
                    array(
                        'label' => 'Roles',
                        'controller' => 'role',
                        'action' => 'index',
                    ),
                    array(
                        'label' => 'Access Rules',
                        'controller' => 'rule',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
);
