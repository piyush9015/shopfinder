<?php
/**
 * Copyright © Adobe Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Vendor\Shopfinder\Model;

use Magento\Framework\Model\AbstractModel;
use Vendor\Shopfinder\Api\Data\ShopfinderInterface;

class Shopfinder extends AbstractModel implements ShopfinderInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Vendor\Shopfinder\Model\ResourceModel\Shopfinder::class);
    }

    /**
     * @inheritDoc
     */
    public function getShopfinderId()
    {
        return $this->getData(self::SHOPFINDER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setShopfinderId($shopfinderId)
    {
        return $this->setData(self::SHOPFINDER_ID, $shopfinderId);
    }

    /**
     * @inheritDoc
     */
    public function getShopname()
    {
        return $this->getData(self::SHOPNAME);
    }

    /**
     * @inheritDoc
     */
    public function setShopname($shopname)
    {
        return $this->setData(self::SHOPNAME, $shopname);
    }

    /**
     * @inheritDoc
     */
    public function getIdentifier()
    {
        return $this->getData(self::IDENTIFIER);
    }

    /**
     * @inheritDoc
     */
    public function setIdentifier($identifier)
    {
        return $this->setData(self::IDENTIFIER, $identifier);
    }

    /**
     * @inheritDoc
     */
    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * @inheritDoc
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * @inheritDoc
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * @inheritDoc
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * @inheritDoc
     */
    public function getLongitude()
    {
        return $this->getData(self::LONGITUDE);
    }

    /**
     * @inheritDoc
     */
    public function setLongitude($longitude)
    {
        return $this->setData(self::LONGITUDE, $longitude);
    }

    /**
     * @inheritDoc
     */
    public function getLatitude()
    {
        return $this->getData(self::LATITUDE);
    }

    /**
     * @inheritDoc
     */
    public function setLatitude($latitude)
    {
        return $this->setData(self::LATITUDE, $latitude);
    }

    /**
     * @inheritDoc
     */
    public function getIsActive() {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * @inheritDoc
     */
    public function setIsActive($status) {
        return $this->setData(self::IS_ACTIVE, $status);
    }

    /**
     * @inheritDoc
     */
    public function getStoreId() {
        return $this->getData(self::STORE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setStoreId($storeId) {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt() {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt) {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt() {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updatedAt) {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }


}

