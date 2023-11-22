<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index()
    {
        $category = DB::table('categories')->get();
        return $category;
    }
    public function store(Request $request){
        $category = Category::create([
            'name' => $request->name,
        ] );

        $category->save();

        return $request;
    }

    public function show(Request $request){
        $category = Category::where('name', $request->name)
        ->get();
        return $category;
    }

    public function destroy(Request $request){
        $category = Category::where('id',$request->id)
        ->delete();
        return 'ok';
    }

    
    public function update(Request $request){
        $category = Category::where('id', $request->id)->first();

        if ($category) {
            $category->name = $request->name;
          
            $category->save();
            return $request;
        } else {
            return response()->json(['mensaje' => 'categoria no encontrada'], 404);
        }
    }
}
