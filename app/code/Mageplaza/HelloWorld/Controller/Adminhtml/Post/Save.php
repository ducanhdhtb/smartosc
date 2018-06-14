<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

use Mageplaza\HelloWorld\Model\PostFactory;
use Magento\Framework\Registry;

class Save extends \Magento\Backend\App\Action
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
    {$request=$this->getRequest();
        $isDelete=0;
        if($request->getPost()){
            $staffModel=$this->_staffFactory->create();
            $staffId=$request->getParam("id");
            $formData=$request->getPostValue();
            $urlRedirect="*/*/add";
            if($staffId){
                $staffModel->load($staffId);
                $urlRedirect="*/*/edit/id/".$staffModel->getId();
                if(isset($formData['avatar']['delete'])){
                    $isDelete=$formData['avatar']['delete'];
                }
                unset($formData['avatar']);
            }
            $staffModel->setData($formData);

            $formFile=$request->getFiles()->toArray();
            if($formFile['avatar']['name']){

                $imageHelper=$this->_objectManager->get("QHO\Staff\Helper\Image");
                $imageFile=$imageHelper->uploadImage("avatar");
                if($imageFile){
                    if($isDelete== 1){
                        $imageHelper->removeImage($staffModel->getAvatar());
                    }
                    $staffModel->setAvatar("staff/$imageFile");
                }else{
                    $this->messageManager->addError(__("Can not upload avatar, please try again"));

                    if($staffId){
                        return $this->_redirect($urlRedirect);
                    }else{
                        $this->_getSession()->setFormData($formData);
                        return $this->_redirect($urlRedirect);
                    }
                }
            }else{
                if(!$staffId){
                    $this->messageManager->addError(__("You must upload staff avatar"));
                    $this->_getSession()->setFormData($formData);
                    return $this->_redirect($urlRedirect);
                }

            }

            $staffModel->save();
            $this->messageManager->addSuccess(__("The staff information has been saved"));
            return $this->_redirect($urlRedirect);
        }
    }
}