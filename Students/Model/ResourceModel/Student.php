<?php
namespace Dckap\Students\Model\ResourceModel;

class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init("students", "id");
    }
}