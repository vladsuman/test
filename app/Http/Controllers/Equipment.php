<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Equipment extends Controller {

    public function getall(Request $request) {
        
        $equipment = \App\Equipment_model::all();
    return response()->json([ $equipment->toJson()] , 200);
        //var_dump($equipment); die;
       
    }
    
    public function getShortages(Request $request) {
        
        $results = DB::select('SELECT SUM(quantity)  Total, equipment.name, start, end, stock, stock - SUM(quantity) as shortage
                                FROM testapi.planning
                                join equipment on equipment.id = planning.equipment
                                group by equipment.name, start, end, stock
                                having shortage  < 0', 
                []);
        /*
        $clean = array();
        
        foreach ($results as $res){
            if((int)$res->shortage < 0){
                $clean[] = $res;
            }
        }
        
        return response()->json([ $clean] , 200);
        */
        return response()->json([ $results] , 200);
    }

}
