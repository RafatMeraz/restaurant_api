<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuItemsModel;
use App\MenuModel;

class FoodController extends Controller
{
    // get all menus of the restaurant
    public function getAllMenus(){
        $result = MenuModel::all();
        return response()->json($result);
    }

    // get all food items
    public function getAllFoods(){
        $result = MenuItemsModel::all();
        return response()->json($result);
    }

    // get selected menu foods
    public function getSelectedMenuFoods(Request $request){
        $menu_id = $request->input('menu_id');
        // executing query into menu_items table using menu_id
        $result = MenuItemsModel::where('menu_id', $menu_id)->get();
        return response()->json($result);
    }

    // get food item details
    public function getFoodItemDetails(Request $request){
        $food_id = $request->input('food_id');
        // executing query into menu_items table using food_id for food details
        $result = MenuItemsModel::where('id', $food_id)->get();
        return response()->json($result);
    }
}
