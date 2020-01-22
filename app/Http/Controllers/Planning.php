<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Planning extends Controller
{
    public function available($equipment_id, $from, $to, $quantity) {
        
        
        $results = DB::select('select SUM(quantity) as Total, equipment.name, equipment.stock from planning join equipment on equipment.id = planning.equipment where equipment = :id and start >= :from and end <= :to group by equipment.name, equipment.stock limit 1', 
                ['id' => $equipment_id, 'from' => $from, 'to' => $to]);
        
        $Total = (int)$results[0]->Total;
        $Stock = (int)$results[0]->stock;
        $name = $results[0]->name;
        $Need = (int)$quantity;
        if(($Stock - $Total - $Need) >= 0){
            $rez = array('available' => true, 'name' => $name);
        }
        else{
            $rez = array('available' => false, 'name' => $name);
        }
           
        
        
        return response()->json([ $rez] , 200);
    }
}
