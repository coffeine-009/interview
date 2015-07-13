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
use Illuminate\Support\Facades\Cache;

/**
 * Class BasketServiceImpl
 * @package App\Http\Services\Implementations
 * Service for work with baskets using session.
 */
class BasketServiceImpl implements BasketService {

    const BASKET_NAME = 'basket.shared';


    /**
     * Find all baskets in memory.
     *
     * @return Basket
     */
    public function find()
    {
        return Cache::get( self :: BASKET_NAME );
    }

    /**
     * Create basket in memory.
     *
     * @param Basket $basket Basket for create
     *
     * @return Created basked
     */
    public function create(Basket $basket)
    {
        if (Cache::add(self :: BASKET_NAME, $basket, 60))
            return $basket;

        return null;
    }

    /**
     * Delete basket from memory.
     *
     * @param Basket $basket Basket for delete
     */
    public function delete(Basket $basket)
    {
        Cache :: forget( self :: BASKET_NAME );
    }
}
