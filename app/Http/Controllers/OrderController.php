<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function store(Request $request){
        $order = Order::create([
            'Customer_id' => $request->Customer_id,
            'Payment_method' => $request->Payment_method,
            'Date' => $request->Date,
            'Total' => $request->Total,
            
        ] );

        $order->save();

        return $request;
    }

    public function show(Request $request){
        $order = Order::where('id', $request->id)
        ->get();
        return $order;
    }

    public function destroy(Request $request){
        $order =Order::where('id',$request->id)
        ->delete();
        return 'ok';
    }

    public function update(Request $request){
        $order = Order::where('id', $request->id)->first();

        if ($order) {
            $order->Customer_id = $request->Customer_id;
            $order->Payment_method = $request-> Payment_method;
            $order->Date = $request-> Date;
            $order->Total = $request-> Total;
           
          
            $order->save();
            return $request;
        } else {
            return response()->json(['mensaje' => 'NO ENCONTRADO'], 404);
        }

    }

}
