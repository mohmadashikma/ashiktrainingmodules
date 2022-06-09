<?php
namespace Dckap\Students\Block;

use Dckap\Students\Model\ResourceModel\Student\CollectionFactory;
class Update extends \Magento\Framework\View\Element\Template
{
    public $studentFactory;
    protected $_pageFactory;
    protected $_contactLoader;
    public CollectionFactory $studentCollection;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Dckap\Students\Model\StudentFactory $studentFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        array $data = []
    ) {
        $this->_pageFactory = $pageFactory;
        $this->studentFactory = $studentFactory;
        parent::__construct($context, $data);
    }
    public function execute()
    {
        return $this->_pageFactory->create();
    }
    public function getStudent()
    {
        $studentId = $this->getRequest()->getParam('id');
        return $this->studentFactory->create()->load($studentId);
    }
}

