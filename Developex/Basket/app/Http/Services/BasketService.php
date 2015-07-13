<?php
/**
 * @copyright (c) 2015, Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Http\Services;

use App\Basket;

/**
 * Interface BasketService
 * @package App\Http\Services
 * Service for work with baskets.
 */
interface BasketService {

    /**
     * Find basket in memory.
     *
     * @return Basket
     */
    public function find();

    /**
     * Create basket in memory.
     *
     * @param Basket $basket    Basket for create
     *
     * @return Created basked
     */
    public function create(Basket $basket);

    /**
     * Delete basket from memory.
     *
     * @param Basket $basket    Basket for delete
     */
    public function delete(Basket $basket);
}
