<?php
namespace Mageplaza\HelloWorld\Controller\Test;
class Forward extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
      /*  Method forward*/
      /*  $this->_forward('index','index');*/
        $this->_redirect('helloworld');
    }
}
?>