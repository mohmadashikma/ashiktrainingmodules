<?php

namespace DCKAP\Literature\Controller\Adminhtml\Items;

class Index extends \DCKAP\Literature\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('DCKAP_Literature::test');
        $resultPage->getConfig()->getTitle()->prepend(__('Catalogue'));
        $resultPage->addBreadcrumb(__('Catalogue'), __('Catalogue'));
        $resultPage->addBreadcrumb(__('Catalogue'), __('Catalogue'));
        return $resultPage;
    }
}