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
use Vendor\Shopfinder\Api\ShopfinderRepositoryInterface;

class ShopList implements ResolverInterface
{
    /**
     * @var ShopfinderRepositoryInterface
     */
    private $getShopList;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @param ShopfinderRepositoryInterface $getShopList
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ShopfinderRepositoryInterface $getShopList,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->getShopList = $getShopList;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
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
        $shopData = $this->getShopData();
        return $shopData;
    }

    /**
     * @return array
     * @throws GraphQlNoSuchEntityException
     */
    private function getShopData(): array
    {
        try {
            /* filter for all the pages */
            $searchCriteria = $this->searchCriteriaBuilder->create();
            $shops = $this->getShopList->getList($searchCriteria)->getItems();
            $data = [];

            foreach($shops as $shop) {
                $data[] = [
                    'shopfinder_id' => $shop['shopfinder_id'],
                    'shopname' => $shop['shopname'],
                    'identifier' => $shop['identifier'],
                    'country' => $shop['country'],
                    'image' => $shop['image'],
                    'longitude' => $shop['longitude'],
                    'latitude' => $shop['latitude'],
                    'store' => $shop['store'],
                    'is_active' => $shop['is_active'],
                    'created_at' => $shop['created_at'],
                    'updated_at' => $shop['updated_at']
                ];
            }
        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
        return $data;
    }
}
