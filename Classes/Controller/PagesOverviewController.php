<?php
namespace PagesOverview\Pagesoverview\Controller;

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
 * PagesOverviewController
 */
class PagesOverviewController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

  
    protected $teaserPageRepository = NULL;
    
    public function listAction()
    {
        $content = [];
        $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
            'title,uid,tstamp', 'pages', '', '', '', '');
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
            $row['tstamp'] = gmdate("d.m.Y H:i:s", $row['tstamp']);
            $content[] = $row;

        }
       
   

       $this->view->assign('alltitles', $content);
    }

}