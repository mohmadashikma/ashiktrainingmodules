<?php
namespace Dckap\Students\Model\ResourceModel\Student;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    
    public function _construct()
    {
        $this->_init(
            \Dckap\Students\Model\Student::class,
            \Dckap\Students\Model\ResourceModel\Student::class
        );
        $this->_map['fields']['id'] = 'main_table.id';
    }
}