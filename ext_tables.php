<?php

use TYPO3\CMS\Core\Information\Typo3Version;

defined('TYPO3') || defined('TYPO3') || die();

(static function (string $_EXTKEY) {
    // Register additional sprite icons
    /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon('extensions-ig_ldap_sso_auth-overlay-ldap-record',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        [
            'source' => 'EXT:' . 'ig_ldap_sso_auth' . '/Resources/Public/Icons/overlay-ldap-record.png',
        ]
    );
    unset($iconRegistry);

    $typoBranch = (new Typo3Version())->getBranch();
    if (version_compare($typoBranch, '12.4', '<')) {
        // Add BE module on top of system main module
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
            'ig_ldap_sso_auth',
            'system',
            'txigldapssoauthM1',
            'top',
            [
                \Causal\IgLdapSsoAuth\Controller\ModuleController::class => implode(',', [
                    'index',
                    'status',
                    'search',
                    'importFrontendUsers', 'importBackendUsers',
                    'importFrontendUserGroups', 'importBackendUserGroups',
                ]),
            ], [
                'access' => 'admin',
                'icon' => 'EXT:' . 'ig_ldap_sso_auth' . '/Resources/Public/Icons/module-ldap.png',
                'labels' => 'LLL:EXT:' . 'ig_ldap_sso_auth' . '/Resources/Private/Language/locallang.xlf'
            ]
        );
    }

    // Initialize "context sensitive help" (csh)
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_igldapssoauth_config', 'EXT:ig_ldap_sso_auth/Resources/Private/Language/locallang_csh_db.xlf');
})('ig_ldap_sso_auth');
