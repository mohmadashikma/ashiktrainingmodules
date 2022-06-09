<?php

namespace DCKAP\Literature\Controller\Adminhtml\Items;
use DCKAP\Literature\Controller\Adminhtml\Items;

class Delete extends Items
{
   public function execute()
   {
      $id = (int) $this->getRequest()->getParam('id');

      if ($id) {

         $literatureModel = $this->_LiteratureFactory->create();
         $this->literatureResource->load($literatureModel, $id);

         // Check this Catalogue exists or not
         if (!$literatureModel->getId()) {
            $this->messageManager->addError(__('This Catalogue no longer exists.'));
         } else {
               try {
                  // Delete Catalogue
                  $literatureModel->delete();
                  $this->messageManager->addSuccess(__('The Catalogue has been deleted.'));

                  // Redirect to grid page
                  $this->_redirect('*/*/');
                  return;
               } catch (\Exception $e) {
                   $this->messageManager->addError($e->getMessage());
                   $this->_redirect('*/*/edit', ['id' => $literatureModel->getId()]);
               }
            }
      }
   }
}
