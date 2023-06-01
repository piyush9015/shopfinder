<?php
/**
 * Copyright © Adobe Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Vendor\Shopfinder\Controller\Adminhtml\Shopfinder;

use Vendor\Shopfinder\Model\ShopfinderFactory;
use Magento\Framework\Exception\LocalizedException;
use Vendor\Shopfinder\Model\ImageUploader;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;
    public $imageUploader;
    public $shopfinderFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     * @param ImageUploader $imageUploader
     * @param ShopfinderFactory $shopfinderFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        ImageUploader $imageUploader,
        ShopfinderFactory $shopfinderFactory
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
        $this->shopfinderFactory = $shopfinderFactory;
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('shopfinder_id');

            $model = $this->_objectManager->create(\Vendor\Shopfinder\Model\Shopfinder::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Shopfinder no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);
            $model = $this->imageData($model, $data);

            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Shop.'));
                $this->dataPersistor->clear('vendor_shopfinder_shopfinder');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['shopfinder_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Shop.'));
            }

            $this->dataPersistor->set('vendor_shopfinder_shopfinder', $data);
            return $resultRedirect->setPath('*/*/edit', ['shopfinder_id' => $this->getRequest()->getParam('shopfinder_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * @param $model
     * @param $data
     * @return mixed
     */
    public function imageData($model, $data)
    {
        if ($model->getId()) {
            $pageData = $this->shopfinderFactory->create();
            $pageData->load($model->getId());
            if (isset($data['image'][0]['name'])) {
                $imageName1 = $pageData->getThumbnail();
                $imageName2 = $data['image'][0]['name'];
                if ($imageName1 != $imageName2) {
                    $imageUrl = $data['image'][0]['url'];
                    $imageName = $data['image'][0]['name'];
                    $data['image'] = $this->imageUploader->saveMediaImage($imageName, $imageUrl);
                } else {
                    $data['image'] = $data['image'][0]['name'];
                }
            } else {
                $data['image'] = '';
            }
        } else {
            if (isset($data['image'][0]['name'])) {
                $imageUrl = $data['image'][0]['url'];
                $imageName = $data['image'][0]['name'];
                $data['image'] = $this->imageUploader->saveMediaImage($imageName, $imageUrl);
            }
        }
        $model->setData($data);
        return $model;
    }
}

