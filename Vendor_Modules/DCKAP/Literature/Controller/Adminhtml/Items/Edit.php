<?php

namespace DCKAP\Literature\Controller\Adminhtml\Items;
use DCKAP\Literature\Controller\Adminhtml\Items;

class Edit extends Items
{
    public function execute()
    {
         $id = (int) $this->getRequest()->getParam('id');
         $model = $this->_LiteratureFactory->create();
         if ($id) {
             
             $this->literatureResource->load($model, $id);
             if (!$model->getId()) {
                 $this->messageManager->addError(__('This Catalogue no longer exists.'));
                 $this->_redirect('*/*/');
                 return;
             }
         }
 
         // Restore previously entered form data from session
         $data = $this->_session->getliteratureData(true);
         if (!empty($data)) {
             $model->setData($data);
         }
         $this->_coreRegistry->register('current_dckap_literature_items', $model);
 
         /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
         $resultPage = $this->resultPageFactory->create();
         
         $resultPage->getConfig()->getTitle()->prepend(__('Catalogue'));
 
         return $resultPage;
    }
}
