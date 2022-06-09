<?php
namespace Dckap\Students\Controller\Manage;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;

class Delete extends AbstractAccount
{
    public $studentFactory;
    public $customerSession;
    public $messageManager;

    public function __construct(
        Context $context,
        \Dckap\Students\Model\StudentFactory $studentFactory,
        Session $customerSession,
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->studentFactory = $studentFactory;
        $this->customerSession = $customerSession;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $customerId = $this->customerSession->getCustomerId();
        $isAuthorised = $this->studentFactory->create()
                                    ->getCollection()
                                    ->addFieldToFilter('user_id', $customerId)
                                    ->addFieldToFilter('id', $id)
                                    ->getSize();
        if (!$isAuthorised) {
            $this->messageManager->addErrorMessage(__('You are not authorised to delete this student.'));
            return $this->resultRedirectFactory->create()->setPath('students/manage/index');
        } else {
            $model = $this->studentFactory->create()->load($id);
            $model->delete();
            $this->messageManager->addSuccessMessage(__('You have successfully deleted the student.'));
        }     
        return $this->resultRedirectFactory->create()->setPath('students/manage/index');
    }
}