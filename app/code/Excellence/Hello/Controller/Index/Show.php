<?php
namespace Excellence\Hello\Controller\Index;


class Show extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        echo "<h1>List all recored</h1>";
        $model = $this->_objectManager->create('Excellence\Hello\Model\Test');
        $data = $model->getCollection()->getData();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}