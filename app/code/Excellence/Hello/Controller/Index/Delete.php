<?php
namespace Excellence\Hello\Controller\Index;


class Delete extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        echo "<h1>Update record</h1>";
        $model = $this->_objectManager->create('Excellence\Hello\Model\Test');
        $data = $model->load(10);
        $data->delete();
        $data->save();
        echo "Delete Successfully!";
    }
}
