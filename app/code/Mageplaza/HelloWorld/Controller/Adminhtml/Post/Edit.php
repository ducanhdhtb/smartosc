<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;
use Mageplaza\HelloWorld\Model\PostFactory;
use Magento\Framework\Registry;

class Edit extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;
    protected $_postFactory;
    protected $_coreRegistry;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Mageplaza\HelloWorld\Model\PostFactory $postFactory,
        Registry $registry
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->_postFactory = $postFactory;
        $this->_coreRegistry = $registry;

    }

    public function execute()
    {
        $postId = $this->getRequest()->getParam("id");
        $model = $this->_postFactory->create();
        if ($postId) {
            $model->load($postId);
            if (!$model->getId()) {
                $this->messageManager->addError(__("This staff no longer exists"));
                return $this->_redirect("*/*/");
            }

        } else {
            $title = "Add a Post : " . $model->getName();
        }
        $this->_coreRegistry->register("staff",$model);

        $resultPage = $this->resultPageFactory->create();
        /*$resultPage->getConfig()->getTitle()->prepend((__(title)));*/
        return $resultPage;

    }
}