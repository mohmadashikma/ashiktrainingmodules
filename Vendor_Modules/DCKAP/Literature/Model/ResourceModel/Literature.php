<?php

namespace DCKAP\Literature\Model\ResourceModel;

class Literature extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('dckap_literature', 'literature_id');   //here "literature" is table name and "literature_id" is the primary key of custom table
    }
}