<?php


namespace Sahy\Banner\Block\Adminhtml\Items\Edit\Tab;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Main extends Generic implements TabInterface
{

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Banner Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Banner Information');
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
        $model = $this->_coreRegistry->registry('current_sahy_banner_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Banner Information')]);
        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }
        $fieldset->addField(
            'name',
            'text',
            ['name' => 'name', 'label' => __('Banner Name'), 'title' => __('Banner Name'), 'required' => true]
        );



        $fieldset->addField(
            'details',
            'textarea',
            ['name' => 'details', 'label' => __('Details'), 'title' => __('Details'), 'required' => false]
        );
        $fieldset->addField(
            'image',
            'image',
            [
                'label' => __('Banner Image'),
                'title' => __('Banner Image'),
                'name' => 'image'
            ]
        );

        // change select to hidden
        $fieldset->addField(
            'pages',
            'hidden',
            [
                'name' => 'pages',
                'label' => __('Pages'),
                'options' => array(
                    '' => '-- Select Page --',
                    'Home Page' => 'Home Page',
                    'Category Page' => 'Category Page',
                    'Product Detail Page' => 'Product Detail Page',
                )
            ]
        );

        $fieldset->addField(
            'layout',
            'select',
            [
                'name' => 'layout',
                'label' => __('Image Type'),
                'options' => array(
                    'subBanner1' => 'Sub Banner 1',
                    'subBanner2' => 'Sub Banner 2'
                )
            ]
        );

        $fieldset->addField(
            'link',
            'text',
            [
                'name' => 'link',
                'label' => __('Banner Link'),
                'title' => __('Banner Link'),
                'required' => false,
                'class' => 'validate-url'
            ]
        );


        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
