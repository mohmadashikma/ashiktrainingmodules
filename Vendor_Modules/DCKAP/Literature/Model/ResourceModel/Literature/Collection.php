<?php

namespace DCKAP\Literature\Model\ResourceModel\Literature;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'literature_id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'DCKAP\Literature\Model\Literature',
            'DCKAP\Literature\Model\ResourceModel\Literature'
        );
    }
}