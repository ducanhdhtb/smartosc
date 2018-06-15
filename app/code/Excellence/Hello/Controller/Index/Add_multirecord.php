<?php
namespace Excellence\Hello\Controller\Index;


class AddMultirecord extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        echo "<h1>Insert Multi records</h1>";
        for($i = 1;$i < 10;$i++)
        {
            $model = $this->_objectManager->create('Excellence\Hello\Model\Test');
            $model->addData([
                'title' =>'Item add' . $i,
            ])->save();
        }
        echo "insert done!";
    }
}