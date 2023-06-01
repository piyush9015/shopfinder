<?php
/**
 * Copyright © Adobe Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Vendor\Shopfinder\Api\Data;

interface ShopfinderInterface
{
    const SHOPFINDER_ID = 'shopfinder_id';
    const IDENTIFIER = 'identifier';
    const COUNTRY = 'country';
    const LONGITUDE = 'longitude';
    const SHOPNAME = 'shopname';
    const LATITUDE = 'latitude';
    const IMAGE = 'image';
    const IS_ACTIVE = 'is_active';
    const STORE_ID = 'store_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get shopfinder_id
     * @return string|null
     */
    public function getShopfinderId();

    /**
     * Set shopfinder_id
     * @param string $shopfinderId
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setShopfinderId($shopfinderId);

    /**
     * Get shopname
     * @return string|null
     */
    public function getShopname();

    /**
     * Set shopname
     * @param string $shopname
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setShopname($shopname);

    /**
     * Get identifier
     * @return string|null
     */
    public function getIdentifier();

    /**
     * Set identifier
     * @param string $identifier
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setIdentifier($identifier);

    /**
     * Get country
     * @return string|null
     */
    public function getCountry();

    /**
     * Set country
     * @param string $country
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setCountry($country);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setImage($image);

    /**
     * Get longitude
     * @return string|null
     */
    public function getLongitude();

    /**
     * Set longitude
     * @param string $longitude
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setLongitude($longitude);

    /**
     * Get latitude
     * @return string|null
     */
    public function getLatitude();

    /**
     * Set latitude
     * @param string $latitude
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setLatitude($latitude);

    /**
     * Get Status
     * @return boolean
     */
    public function getIsActive();

    /**
     * Set Status
     * @param bool $status
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setIsActive($status);

    /**
     * Get store id
     *
     * @return string|null
     */
    public function getStoreId();

    /**
     * Set store id
     *
     * @param string $storeId
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setStoreId($storeId);

    /**
     * Get created at time
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created at time
     *
     * @param string $createdAt
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated at time
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated at time
     *
     * @param string $updatedAt
     * @return \Vendor\Shopfinder\Shopfinder\Api\Data\ShopfinderInterface
     */
    public function setUpdatedAt($updatedAt);
}

