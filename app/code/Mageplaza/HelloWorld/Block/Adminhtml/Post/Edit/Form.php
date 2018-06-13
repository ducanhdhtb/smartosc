<?php

namespace Mageplaza\HelloWorld\Block\Adminhtml\Post\Edit;

use Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic
{
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
        $fieldset=$form->addFieldset(
            "base_fieldset",
            ["legend"=>__("General Information"),"class"=>"fieldset-wide"]
        );

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
            "text",
            [
                "name" => "name",
                "label" => __("Selectbox"),
                "required" => true,
            ]
        );

        $fieldset->addField(
            "featured_image",
            "text",
            [
                "name" => "name",
                "label" => __("Feature image"),
                "required" => true,
            ]
        );

        $form->setHtmlIdPrefix("staff_main_");
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}