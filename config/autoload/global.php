<?php
/**
 * Global Configuration Override
 */

return array(
    
     'civuser' => array(
        
        // Persistance config
        'persistance' => array(
            'type' => 'dbtable',
            'table' => 'user'
        ),
        
        // Local auth adapter
        'adapter' => array(
            'type'             => 'dbtable',
            'table'            => 'user',
            'identifier_field' => 'username',
            'credential_field' => 'password'
        ),

        'profile_link' => array(
            'class' => 'btn btn-default'
        ),
    ),
    
    'CivAccess' => array(
        'new_role_event_id'     => 'Cobalt\Service\UserService',
        'new_role_event'        => 'add.post',
        'new_role_event_param'  => 'user',
        'old_role_event_id'     => 'Cobalt\Service\UserService',
        'old_role_event'        => 'remove.post',
        'old_role_event_param'  => 'id',
        'display_info'          => true
    ),
    
    'service_manager' => array(
        'aliases' => array(
            'CivAccess\AuthService' => 'CivUser\AuthService'
        ),
    ),
);
