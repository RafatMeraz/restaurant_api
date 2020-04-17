<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartModel;

class CartController extends Controller
{

    // Add to carts
    public function addToCarts(Request $request){
        $customer_id = $request->input('customer_id');
        $food_id = $request->input('food_id');
        $check_cart = CartModel::where([
            "customer_id"=> $customer_id,
            "food_id"=> $food_id
        ])->count();
        if ($check_cart <= 0){
            // Adding food into carts table
            $result = CartModel::insert([
                "customer_id"=> $customer_id,
                "food_id"=> $food_id
            ]);
            if ($result == true){
                return response()->json([
                    'error'=> false,
                    'status'=> 'Added to carts!'
                ]);
            } else{
                return response()->json([
                    'error'=> true,
                    'status'=> 'Failed to add carts! Try Again.'
                ]);
            }
        } else {
            return response()->json([
                'error'=> true,
                'status'=> 'Already added to carts.'
            ]);
        }

    }

    // Deleting from carts
    public function deleteToCarts(Request $request){
        $cart_id = $request->input('cart_id');
        // Deleting from carts table
        $result = CartModel::where('id', $cart_id)->delete();
        if ($result == true){
            return response()->json([
                'error'=> false,
                'status'=> 'Remove from carts!'
            ]);
        } else{
            return response()->json([
                'error'=> true,
                'status'=> 'Failed to remove from carts! Try Again.'
            ]);
        }
    }
}
