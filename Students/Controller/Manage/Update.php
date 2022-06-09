<?php
namespace Dckap\Students\Controller\Manage;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;


class Update extends AbstractAccount
{
    public $resultPageFactory;
    public $studentFactory;
    public $messageManager;
    protected $_request;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        \Dckap\Students\Model\StudentFactory $studentFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        Session $customerSession
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->studentFactory = $studentFactory;
        $this->customerSession = $customerSession;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->resultPageFactory->create();
        $customerId = $this->customerSession->getCustomerId();
        $isAuthorised = $this->studentFactory->create()
                                    ->getCollection()
                                    ->addFieldToFilter('user_id', $customerId)
                                    ->addFieldToFilter('id', $id)
                                    ->getSize();
        if (!$isAuthorised) {
            $this->messageManager->addError(__('You are not authorised to edit this student.'));
            return $this->resultRedirectFactory->create()->setPath('students/manage/index');
        }
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Update Student'));
        $layout = $resultPage->getLayout();
        return $resultPage;
    }
}

