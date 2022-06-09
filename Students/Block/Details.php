<?php
namespace Dckap\Students\Block;

use Dckap\Students\Model\StudentFactory;
use Magento\Customer\Model\Session;

class Details extends \Magento\Framework\View\Element\Template
{
    public $studentCollection;
    public $studentFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Dckap\Students\Model\ResourceModel\Student\CollectionFactory $studentCollection,
        StudentFactory $studentFactory,
        Session $customerSession,
        array $data = []
    ) {
        $this->studentFactory = $studentFactory;
        $this->studentCollection = $studentCollection;
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function getDetails()
    {
        $customerId = $this->customerSession->getCustomer()->getId();
        $collection = $this->studentCollection->create();
        $collection->addFieldToFilter('user_id', ['eq'=>$customerId]);
        return $collection;
    }

}

//this is changed from webkul