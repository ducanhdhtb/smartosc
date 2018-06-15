<?php
namespace Excellence\Hello\Controller\Index;


class Index3 extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        echo "<h1>Show data from Id</h1>";
        $model = $this->_objectManager->create('Excellence\Hello\Model\Test');
        $data = $model->load(2)->getData();
        echo "<pre>";
            print_r($data);
        echo "</pre>";
    }
}