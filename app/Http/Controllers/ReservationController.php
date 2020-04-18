<?php

namespace App\Http\Controllers;

use App\ReservationModel;
use Illuminate\Http\Request;
use App\SectionPropertyModel;
use App\SectionsModel;
use App\SectionTypeModel;
use App\DiningTableStatusModel;
use App\DiningTablesModel;

class ReservationController extends Controller
{

    // get all dining tables
    public function getAllDiningTable(Request $request){
        $table_status = DiningTableStatusModel::all();
        $section_properties = SectionPropertyModel::all();
        $section_types = SectionTypeModel::all();
        $sections = SectionsModel::all();
        $dining_tables = DiningTablesModel::all();

        return response()->json([
           'table_Status'=> $table_status,
           'section_properties'=> $section_properties,
           'section_types'=> $section_types,
           'sections'=> $sections,
           'dining_table'=> $dining_tables
        ]);
    }

    // reserve a table for a time
    public function reserveTable(Request $request){
        $reservation_date = $request->input('reservation_date');
        $customer_id = $request->input('customer_id');
        $reservation_time = $request->input('reservation_time');
        $dining_table_id = $request->input('dining_table_id');
        // insert new reservation into reservation table
        $result = ReservationModel::insert([
            'reservation_date'=> $reservation_date,
            'customer_id'=> $customer_id,
            'dining_table_id'=> $dining_table_id,
            'time'=> $reservation_time
        ]);
        if ($result == true){
            return response()->json([
                'error'=> false,
                'status'=> 'Table reservation successful!'
            ]);
        } else {
            return response()->json([
                'error'=> true,
                'status'=> 'Table reservation Failed! Try again.'
            ]);
        }
    }
}
