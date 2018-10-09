<?php
namespace PagesOverview\Pagesoverview\Controller\;

/***
 *
 * This file is part of the "pages_overview" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * MyControllerController
 */
class MyControllerController extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    public function myaction()
    {
        $this->view->assign('currentAction', $this->request->getControllerActionName());
        $this->view->assign('settings', $this->extensionBuilderConfigurationManager->getSettings());
        if (!$this->request->hasArgument('action')) {
            $userSettings = $this->getBackendUserAuthentication()->getModuleData('extensionbuilder');
            if ($userSettings['firstTime'] === 0) {
                $this->forward('domainmodelling');
            }
        }
    }

}
