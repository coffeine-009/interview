<?php
/**
 * @copyright (c) 2015, Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Http\Services\Implementations;

use App\Basket;
use App\Http\Services\BasketService;
use App\Http\Services\Created;

/**
 * Class BasketServiceImpl
 * @package App\Http\Services\Implementations
 * Service for work with baskets using session.
 */
class BasketServiceImpl implements BasketService {

    /**
     * Create basket in memory.
     * In this case: in session
     *
     * @param Basket $basket Basket for create
     *
     * @return Created basked
     */
    public function create(Basket $basket)
    {
        // TODO: Implement create() method.
    }

    /**
     * Delete basket from memory.
     * In this case: from session
     *
     * @param Basket $basket Basket for delete
     */
    public function delete(Basket $basket)
    {
        // TODO: Implement delete() method.
    }
}
