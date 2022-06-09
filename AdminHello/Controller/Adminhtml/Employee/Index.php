<?php
namespace Dckap\AdminHello\Controller\Adminhtml\Employee;

class Index extends \Magento\Backend\App\Action
{
    /**
     * Hello test controller page.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        echo __('Hello Dckap Team.');
    }

    /**
     * Check Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dckap_AdminHello::employee');
    }
}