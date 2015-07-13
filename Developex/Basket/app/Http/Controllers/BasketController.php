<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Http\Requests;
use App\Http\Requests\ProductAddRequest;
use App\Http\Services\BasketService;
use App\ShoppingBasketImpl;
use Illuminate\Support\Facades\Response;

class BasketController extends Controller
{
    /**
     * @var BasketService
     */
    private $basketService;


    public function __construct(BasketService $basketService) {
        // Init
        $this -> basketService = $basketService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $basket = $this -> basketService -> find();

        if ($basket instanceof Basket) {
            // Return shared basket
            return Response::json(
                $basket, 
                200
            );
        }

        // Failure
        return Response :: json(
            null, 
            404
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return Response::json(
            $this -> basketService -> create(
                new ShoppingBasketImpl()
            ), 
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function addProduct(ProductAddRequest $request) {
        return Response::json(array('ok'=>'ok'), 201);
    }
}
