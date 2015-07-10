<?php
/**
 * @copyright (c) 2015, Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App;

/**
 * Class ShoppingBasketImpl
 * @package App
 *
 * Implementation of basket
 * //FIXME: Move to structured namespaces
 */
class ShoppingBasketImpl implements Basket {

    /**
     * Get list of products from basket.
     *
     * @return List of products
     */
    public function getProducts()
    {
        // TODO: Implement getProducts() method.
    }

    /**
     * Add product into basket.
     *
     * @param Product $product Product for add into basket
     *
     * @return Created product
     */
    public function addProduct(Product $product)
    {
        // TODO: Implement addProduct() method.
    }

    /**
     * Update product in busket.
     *
     * @param Product $product Product for update
     *
     * @return Updated product
     */
    public function update(Product $product)
    {
        // TODO: Implement update() method.
    }

    /**
     * Delete product from basket.
     *
     * @param Product $product Product for delete
     */
    public function delete(Product $product)
    {
        // TODO: Implement delete() method.
    }
}
