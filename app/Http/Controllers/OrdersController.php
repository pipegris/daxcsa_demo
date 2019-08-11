<?php

namespace App\Http\Controllers;

use \GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Request;

class OrdersController extends Controller
{
    public function index(HttpClient $client)
    {
        $response = $client->get(env('API_DOMAIN') . '/api/orders');
        $orders = json_decode($response->getBody(), true);
        foreach($orders as &$order) {
            $order = $this->calculateTotals($order);
        }
        return view('orders.index', ['orders' => $orders]);
    }


    public function show(HttpClient $client, $orderId)
    {
        $response = $client->get(env('API_DOMAIN') . '/api/orders/' . $orderId);
        $order = json_decode($response->getBody(), true);
        $order = $this->calculateTotals($order);
        return view('orders.detail', ['order' => $order]);
    }


    private function calculateTotals($order) {
        $order['total_items'] = 0;
        foreach ($order['items'] as $item) {
            $order['total_items'] += $item['quantity'] * $item['price'];
        }
        $order['total_cost'] = $order['total_items'] + $order['taxes'] + $order['shipping'];

        return $order;
    }
}
