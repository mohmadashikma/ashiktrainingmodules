<?php

namespace DCKAP\Literature\Block;

use Magento\Framework\View\Element\Template\Context;
use DCKAP\Literature\Model\LiteratureFactory;

/**
 * Literature List block
 */
class LiteratureListData extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Literature
     */
    protected $_literature;
    public function __construct(
        Context $context,
        \Magento\Framework\Filesystem\DirectoryList $dir,
        LiteratureFactory $literature
    ) {
        $this->_literature = $literature;
        $this->_dir = $dir;
        parent::__construct($context);
    }

    public function getLiteratureCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        // $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;

        $literature = $this->_literature->create();
        $collection = $literature->getCollection();
        // $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }
    public function getLiterature() 
    {
        $literature = $this->_literature->create();
        $result = $literature->getLiterature();
        return $result;
    }
    public function formatSizeUnits($filename) {//filesize;die;
        $bytes = '0 bytes';

         if (file_exists($this->_dir->getPath('base').'/pub/media/'.$filename)) {
            $bytes = filesize($this->_dir->getPath('base').'/pub/media/'.$filename);
            
            if ($bytes >= 1073741824)
            {
                $bytes = number_format($bytes / 1073741824, 2) . ' GB';
            }
            elseif ($bytes >= 1048576)
            {
                $bytes = number_format($bytes / 1048576, 2) . ' MB';
            }
            elseif ($bytes >= 1024)
            {
                $bytes = number_format($bytes / 1024, 2) . ' KB';
            }
            elseif ($bytes > 1)
            {
                $bytes = $bytes . ' bytes';
            }
            elseif ($bytes == 1)
            {
                $bytes = $bytes . ' byte';
            }
            else
            {
                $bytes = '0 bytes';
            }
        }
        return $bytes;
        } 
}