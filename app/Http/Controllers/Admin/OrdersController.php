<?php

namespace Weingut\Http\Controllers\Admin;

use Weingut\Models\Order;
use Illuminate\Http\Request;
use Weingut\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
        {
            $orders = Order::all();

            $params = [
                'title' => 'Orders Listing',
                'orders' => $orders,
            ];

            return view('admin.orders.orders_list')->with($params);
        }
    }
