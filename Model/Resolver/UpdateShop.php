<?php
/*******************************************************************************
 * ADOBE CONFIDENTIAL
 * ___________________
 *
 * Copyright 2023 Adobe
 * All Rights Reserved.
 *
 * NOTICE: All information contained herein is, and remains
 * the property of Adobe and its suppliers, if any. The intellectual
 * and technical concepts contained herein are proprietary to Adobe
 * and its suppliers and are protected by all applicable intellectual
 * property laws, including trade secret and copyright laws.
 * Adobe permits you to use and modify this file
 * in accordance with the terms of the Adobe license agreement
 * accompanying it (see LICENSE_ADOBE_PS.txt).
 * If you have received this file from a source other than Adobe,
 * then your use, modification, or distribution of it
 * requires the prior written permission from Adobe.
 ******************************************************************************/

declare(strict_types=1);

namespace Vendor\Shopfinder\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Vendor\Shopfinder\Model\ShopfinderFactory;

class UpdateShop implements ResolverInterface
{
    /**
     * @var \Vendor\Shopfinder\Model\ResourceModel\Shopfinder
     */
    private $shopfinderResource;

    /**
     * @var ShopfinderFactory
     */
    private $shopfinderFactory;

    /**
     * @param \Vendor\Shopfinder\Model\ResourceModel\Shopfinder $shopfinderResource
     * @param ShopfinderFactory $shopfinder
     */
    public function __construct(
        \Vendor\Shopfinder\Model\ResourceModel\Shopfinder $shopfinderResource,
        ShopfinderFactory $shopfinderFactory
    ) {
        $this->shopfinderResource = $shopfinderResource;
        $this->shopfinderFactory = $shopfinderFactory;
    }

    /**
     * Get All applied coupons
     *
     * @param Field $field
     * @param \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|\Magento\Framework\GraphQl\Query\Resolver\Value|mixed
     * @throws GraphQlInputException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function resolve(
        Field $field,
              $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ): array {

        /* filter for all the pages */
        if (!isset($args['id'])) {
            throw new GraphQlNoSuchEntityException(__('Please pass the Shop ID.'));
        }

        $shopData = $this->updateShopData($args);
        return $shopData;
    }

    /**
     *
     * @param array
     * @return array
     * @throws GraphQlNoSuchEntityException
     */
    private function updateShopData($args): array
    {
        try {
            $id = (int) $args['id'];
            $shop = $this->shopfinderFactory->create();
            $shop->load($id);

            if (!$shop->getShopfinderId()) {
                throw new NoSuchEntityException(__('Shopfinder with id "%1" does not exist.', $id));
            }

            foreach ($args['input'] as $key => $value) {
                $data[$key] = $value;
                $shop->setData($key,$value);
            }
            //update Shop Data
            $this->shopfinderResource->save($shop);

            $data = [
                'shopfinder_id' => $shop->getShopfinderId(),
                'shopname' => $shop->getShopname(),
                'identifier' => $shop->getIdentifier(),
                'country' => $shop->getCountry(),
                'image' => $shop->getImage(),
                'longitude' => $shop->getLongitude(),
                'latitude' => $shop->getLatitude(),
                'store' => $shop->getStoreId(),
                'is_active' => $shop->getIsActive(),
                'created_at' => $shop->getCreatedAt(),
                'updated_at' => $shop->getUpdatedAt()
            ];

        } catch (\Exception $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
        return $data;
    }
}
