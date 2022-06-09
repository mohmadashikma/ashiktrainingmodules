<?php

namespace DCKAP\Literature\Block\Adminhtml;

class Items extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'items';
        $this->_headerText = __('Catalogue');
        $this->_addButtonLabel = __('Add New Catalogue');
        parent::_construct();
    }
}
