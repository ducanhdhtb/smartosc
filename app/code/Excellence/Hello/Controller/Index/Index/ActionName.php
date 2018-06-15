<?php
namespace Excellence\Hello\Controller\Index;
use Magento\Framework\Controller\ResultFactory;
class Actionname name extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        // Your code
        $resultRedirect->setPath('excellence/index/add');
        return $resultRedirect;

        //return $this->resultRedirectFactory->create()->setPath('excellence/index/add/', ['_current' => true]);

    }
}
?>