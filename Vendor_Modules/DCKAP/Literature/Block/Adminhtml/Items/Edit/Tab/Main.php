<?php

namespace DCKAP\Literature\Block\Adminhtml\Items\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{
    protected $_wysiwygConfig;
 
    public function __construct(
        \Magento\Backend\Block\Template\Context $context, 
        \Magento\Framework\Registry $registry, 
        \Magento\Framework\Data\FormFactory $formFactory,  
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig, 
        array $data = []
    ) 
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Catalogue');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Catalogue');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_dckap_literature_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Automotive Catalogue')]);
        if ($model->getId()) {
            $fieldset->addField('literature_id', 'hidden', ['name' => 'literature_id']);
        }

        $fieldset->addField('industry', 'select', [
            'label'     => __('Industry'),
            'title'     => __('Industry'),
            'name'      => 'industry',
            'required' => true,
            'options'    => [
                '1' => __('Electrical'),
                '0' => __('Automotive'),
            ],
        ]);

        $fieldset->addField(
            'title',
            'text',
            ['name' => 'title', 'label' => __('Title'), 'title' => __('Title'), 'required' => true]
        );
        $fieldset->addField(
            'sku',
            'text',
            ['name' => 'sku', 'label' => __('SKU'), 'title' => __('Sku'), 'required' => true]
        );
        $fieldset->addField(
            'total_pages',
            'text',
            ['name' => 'total_pages', 'label' => __('Total Pages'), 'title' => __('Total Pages'), 'required' => true, 'class' => 'validate-number']
        );
        $fieldset->addField(
            'image',
            'image',
            [
                'name' => 'image',
                'label' => __('Image'),
                'title' => __('Image'),
                'required'  => false
            ]
        );
        $fieldset->addField(
            'pdf',
            'file',
            [
                'name' => 'pdf',
                'label' => __('Pdf'),
                'title' => __('Pdf'),
                'required'  => false
            ]
        );
           

        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
