# shopfinder
Module to manage the store

**Steps to install module:

```xml
composer config repositories.shopfinder-module vcs https://github.com/manish-ranjann/shopfinder.git
composer require vendor/module-shopfinder:dev-main
composer update vendor/module-shopfinder
php bin/magento setup:static-content:deploy 
php bin/magento setup:upgrade
php bin/magento setup:di:compile
```


**GraphQL EndPoints:**

**1. Shop List **
    **Request Body:**
    
    query {
      shopList {
        shopfinder_id
        shopname
        identifier
        country
        image
        longitude
        latitude
        store
        is_active
        created_at
        updated_at
      }
    }
  

**2. Shop List By ID:**
    **Request Body**
    
    query {
      shopListById (
          id: 2
      ) {
        shopfinder_id
        shopname
        identifier
        country
        image
        longitude
        latitude
        store
        is_active
        created_at
        updated_at
      }
    }


**3. Update Shop:**
    **Request Body**
    
    mutation {
      updateShop (
          id: 1
          input : {
              shopname: "2"
              identifier: "somename"
          }
      ) {
        shopfinder_id
        shopname
        identifier
        country
        image
        longitude
        latitude
        store
        is_active
      }
    }
