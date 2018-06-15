<?php
namespace Excellence\Hello\Controller\Index;


class Add extends \Magento\Framework\App\Action\Action
{
  public function execute()
    {
        $model = $this->_objectManager->create('Excellence\Hello\Model\Test');
        $model->addData([
            'title' =>'Item add ',
        ])->save();
        echo "insert done!";

    }
}