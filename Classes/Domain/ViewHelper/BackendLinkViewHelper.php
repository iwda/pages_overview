<?php
namespace PagesOverview\Pagesoverview\ViewHelpers;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class BackendLinkViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {
        protected $tagName = 'a';
        
        /**
         * @param string $parameters
         * @param string $returnUrl
         */
        public function render($parameters, $returnUrl = '') {  
                $uri = \TYPO3\CMS\Backend\Utility\BackendUtility::getModuleUrl('record_edit').'&'.$parameters;
                if (!empty($returnUrl)) {
                        $uri .= '&returnUrl='.rawurlencode($returnUrl);
                } else {
                        $uri .= '&returnUrl='.rawurlencode(\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('REQUEST_URI'));
                }
                $this->tag->addAttribute('href', $uri);
                $this->tag->setContent($this->renderChildren());
                $this->tag->forceClosingTag(TRUE);
                return $this->tag->render();
        }
        
}