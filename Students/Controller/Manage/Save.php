<?php
namespace Dckap\Students\Controller\Manage;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Dckap\Students\Model\StudentFactory;
use Magento\Customer\Model\Session;


class Save extends AbstractAccount
{
    public $studentFactory;
    public $customerSession;
    public $messageManager;

    public function __construct(
        Context $context,
        StudentFactory $studentFactory,
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
        $data = $this->getRequest()->getParams();
        $customerId = $this->customerSession->getCustomerId();
        if(isset($data['id'])&&$data['id'])
        {
                $model  = $this->studentFactory->create()->load($data['id']);
                $model->setName($data['name'])
                    ->setPhone($data['phone'])
                    ->setEmail($data['email'])
                    ->save();
                $this->messageManager->addSuccessMessage(__('You have updated the student successfully.'));
        }
        else
        {
            $model = $this->studentFactory->create();
            $model->setData($data);
            $model->setUserId($customerId);
            $model->save();
            $this->messageManager->addSuccessMessage(__('Blog saved successfully.'));
        }
        return $this->resultRedirectFactory->create()->setPath('students/manage/index'); 
    }
}