<?php

declare (strict_types = 1);

return [
    'be-ig_ldap_sso_auth' => [
        'parent' => 'system',
        'access' => 'admin',
        'workspaces' => 'live',
        'extensionName' => 'ig_ldap_sso_auth',
        //'iconIdentifier' => '',
        'labels' => [
            'title' => 'be-ig_ldap_sso_auth',
        ],
        'controllerActions' => [
            \Causal\IgLdapSsoAuth\Controller\ModuleController::class => [
                'index',
                'status',
                'search',
                'importFrontendUsers',
                'importBackendUsers',
                'importFrontendUserGroups',
                'importBackendUserGroups',
            ],
        ],
    ],
];
