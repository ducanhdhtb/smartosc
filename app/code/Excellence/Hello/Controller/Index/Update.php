<?php
namespace Excellence\Hello\Controller\Index;


class Update extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        echo "<h1>Update record</h1>";
        $model = $this->_objectManager->create('Excellence\Hello\Model\Test');
        $data = $model->load(2);
        $data->setTitle('Tieu de 999 ');
        $data->save();
        echo "Update Successfully!";
    }
}