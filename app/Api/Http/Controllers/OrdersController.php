<?php

namespace App\Api\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Collection of purchases made by the user
 * @Resource("Orders", uri="/orders")
 */
class OrdersController extends Controller
{
    public function __construct()
    {
        $this->orders = require 'orders_data.php';
    }

    /**
     * Show all orders
     *
     * Get a JSON representation of all the purchase orders.
     *
     * @Get("/")
     */
    public function index()
    {
        return $this->orders;
    }


    /**
     * Show details of a purchase order
     *
     * Get a JSON representation of a specific purchase order.
     *
     * @Get("/")
     * @param $orderId
     * @return array
     */
    public function show($orderId)
    {
        return $this->orders[$orderId];
    }
}
