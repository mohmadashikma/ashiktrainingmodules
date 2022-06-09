<?php

namespace DCKAP\Literature\Controller\Adminhtml\Items;

class NewAction extends \DCKAP\Literature\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
