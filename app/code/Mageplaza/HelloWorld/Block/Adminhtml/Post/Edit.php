<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Post;
use Magento\Backend\Block\Widget\Form\Container;
class Edit extends Container{
    protected function _construct(){
        $this->_blockGroup="Mageplaza_HelloWorld";
        $this->_controller="adminhtml_post";
        $this->objectId="id";
        parent::_construct();
    }
}
?>