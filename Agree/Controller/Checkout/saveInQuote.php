<?php

namespace Dckap\Agree\Controller\Checkout;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\View\LayoutFactory;
use Magento\Checkout\Model\Cart;
use Magento\Framework\App\Action\Action;
use Magento\Checkout\Model\Session;
use Magento\Quote\Model\QuoteRepository;
use Psr\Log\LoggerInterface;

class saveInQuote extends Action
{
    protected $resultForwardFactory;
    protected $layoutFactory;
    protected $cart;
    protected $logger;

    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory,
        LayoutFactory $layoutFactory,
        Cart $cart,
        Session $checkoutSession,
        LoggerInterface $logger,
        QuoteRepository $quoteRepository
    )
    {
        $this->logger = $logger;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->layoutFactory = $layoutFactory;
        $this->cart = $cart;
        $this->checkoutSession = $checkoutSession;
        $this->quoteRepository = $quoteRepository;

        parent::__construct($context);
    }

    public function execute()
    {
        $this->logger->info("This is from saveInQuote.php by Ashik ");
        $checkVal = $this->getRequest()->getParam('checkVal');
        $this->logger->info("The checkVal in saveInQuote.php is ".$checkVal);

        $quoteId = $this->checkoutSession->getQuoteId();
        $this->logger->info("The quoteId value in saveInQuote.php is ".$quoteId);

        $quote = $this->quoteRepository->get($quoteId);
        $quote->setAgree($checkVal);
        $quote->save();
    }
}
