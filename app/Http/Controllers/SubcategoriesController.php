<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategories;
use Illuminate\Support\Facades\DB;


class SubcategoriesController extends Controller
{
    public function index()
    {
        $subcategories = DB::table('subcategories')->get();
        return $subcategories;
    }
    public function store(Request $request){
        $subcategories = Subcategories::create([
            'name' => $request->name,
            'Category_id' => $request->Category_id,
        ] );

        $subcategories->save();

        return $request;
    }

    public function show(Request $request){
        $subcategories = Subcategories::where('id', $request->id)
        ->get();
        return $subcategories;
    }

    public function destroy(Request $request){
        $subcategories =Subcategories::where('id',$request->id)
        ->delete();
        return 'ok';
    }

    
    public function update(Request $request){
        $subcategories = Subcategories::where('id', $request->id)->first();

        if ($subcategories) {
            $subcategories->name = $request->name;
            $subcategories->Category_id = $request-> Category_id;
            $subcategories->save();
            return $request;
        } else {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }
    }
}
