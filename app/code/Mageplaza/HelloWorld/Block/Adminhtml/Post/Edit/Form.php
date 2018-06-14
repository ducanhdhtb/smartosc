<?php

namespace Mageplaza\HelloWorld\Block\Adminhtml\Post\Edit;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Mageplaza\HelloWorld\Model\Config\Status;

class Form extends Generic
{
    protected $_postStatus;
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Status $status,
        array $data)
    {
        $this->_postStatus = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    protected function _prepareForm()
    {

        $model = $this->_coreRegistry->registry("staff");
        $form = $this->_formFactory->create(
            [
                "data" => [
                    "id" => "edit_form",
                    "action" => $this->getData('action'),
                    "method" => "post",
                    "enctype" => "multipart/form-data"
                ]
            ]
        );
        $fieldset = $form->addFieldset(
            "base_fieldset",
            ["legend" => __("General Information"), "class" => "fieldset-wide"]
        );

        if($model->getId()){
            $fieldset->addField(
                "id",
                "hidden",
                ["name" => "id"]
            );
        }

        $fieldset->addField(
            "name",
            "text",
            [
                "name" => "name",
                "label" => __("Full Name"),
                "required" => true,
            ]
        );

        $fieldset->addField(
            "url_key",
            "text",
            [
                "name" => "name",
                "label" => __("Url Key"),
                "required" => true,
            ]
        );

        $fieldset->addField(
            "post_content",
            "text",
            [
                "name" => "name",
                "label" => __("Post content"),
                "required" => true,
            ]
        );

        $fieldset->addField(
            "tags",
            "text",
            [
                "name" => "name",
                "label" => __("Tags"),
                "required" => true,
            ]
        );
        $fieldset->addField(
            "status",
            "select",
            [
                "name" => "name",
                "label" => __("Status"),
                "required" => true,
                "options" => $this->_postStatus->toOptionArray(),

            ]
        );

        $fieldset->addField(
            "featured_image",
            "image",
            [
                "name" => "name",
                "label" => __("Feature image"),
                "required" => true,
            ]
        );
        $data = $model->getData();
        $form->setValues($data);
        $form->setHtmlIdPrefix("staff_main_");
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}