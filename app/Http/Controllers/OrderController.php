<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetailsModel;

class OrderController extends Controller
{

    // inserting order into Orders & Orders Details
    public function insertOrder(Request $request){
        $order_array = $request->input('all');
        $arr = array();
        foreach ($order_array as $order){
            $customer_id = $order['customer_id'];
            $order_type_id = $order['order_type_id'];
            $item_quantity = $order['item_quantity'];
            $amount= $order['amount'];
            $item_id = $order['item_id'];

            // Adding order int order_details
            $result = OrderDetailsModel::insert([
                'item_id'=> $item_id,
                'item_quantity'=> $item_quantity,
                'amount'=> $amount,
                'order_type_id'=> $order_type_id,
                'customer_id'=> $customer_id
            ]);

            array_push($arr, $result);
        }
        return response()->json($arr);
    }
}
