<?php
defined('TYPO3_MODE') || die('Access denied.');

//VENDOR: PageOverview
//EXTKEY: pageoverview
//NAME: page_overview

if (TYPO3_MODE=='BE')    {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'PagesOverview.' . $_EXTKEY,
        'web',
        'pagesoverview',
        '',
        array(
          'PagesOverview' => 'list',
        ),
        array(
          'access' => 'user,group',
          'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/database.png',
          'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xlf:applicationName',
        )
    );

}


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'PagesOverview');