<?php
namespace Dckap\HelloWorld\Block;

use Magento\Framework\View\Element\Template;

class Hello extends Template
{
    public function getText() {
        return "This Hello World Program is Written By AshikG";
    }
}