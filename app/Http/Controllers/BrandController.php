<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brand = DB::table('brands')->get();
        return $brand;
    }

    public function store(Request $request){
        $brand = Brand::create([
            'name' => $request->input('name'),
        ] );
        return $brand;
    }

    public function show(Request $request){
        $brand = Brand::where('name', $request->name)
        ->get();
        return $brand;
    }

    public function destroy(Request $request){
        $brand =Brand::where('id',$request->id)
        ->delete();
        return 'ok';
    }

    
    public function update(Request $request){
        $brand = Brand::where('id', $request->id)->first();

        if ($brand) {
            $brand->name = $request->name;
            $brand->save();
            return $request;
        } else {
            return response()->json(['mensaje' => 'Marca no encontrada'], 404);
        }
    }
}
