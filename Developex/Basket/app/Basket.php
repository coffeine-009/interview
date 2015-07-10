<?php
/**
 * @copyright (c) 2015, Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App;

/**
 * Interface Basket for describe general basket
 * @package App
 * //FIXME: Move to structured namespaces
 */
interface Basket {

    /**
     * Get list of products from basket.
     *
     * @return List of products
     */
    public function getProducts();

    /**
     * Add product into basket.
     *
     * @param Product $product  Product for add into basket
     *
     * @return Created product
     */
    public function addProduct(Product $product);

    /**
     * Update product in busket.
     *
     * @param Product $product  Product for update
     *
     * @return Updated product
     */
    public function update(Product $product);

    /**
     * Delete product from basket.
     *
     * @param Product $product  Product for delete
     */
    public function delete(Product $product);
}
