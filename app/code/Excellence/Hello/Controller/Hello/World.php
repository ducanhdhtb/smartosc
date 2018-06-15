<?php
namespace Excellence\Hello\Controller\Hello;
 
 
class World extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }
     
    public function execute()
    {
        //return $this->resultPageFactory->create();
        $model = $this->_objectManager->create('Excellence\Hello\Model\Test');
        $model->addData([
            'title' =>'Item add ',
        ])->save();

    } 
}