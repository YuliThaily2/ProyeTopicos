<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return $products;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'Category_id' => 'required',
            'Brand_id' => 'required',
            'Supplier_id' => 'required',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::create($request->all());

        if ($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->img_path = 'images/'.$imageName;
            $product->save();
        }

        return response()->json($product, 201);
    }

    public function show(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        return $product;
    }

    public function destroy(Request $request)
    {
        $product = Product::where('id', $request->id)->delete();
        return 'ok';
    }

    public function update(Request $request)
{
    $product = Product::where('id', $request->id)->first();

    if ($product) {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;
        $product->Category_id = $request->Category_id;
        $product->Brand_id = $request->Brand_id;
        $product->Supplier_id = $request->Supplier_id;

        // Check if a new image is uploaded
        if ($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->img_path = 'images/'.$imageName;
        }

        $product->save();
        return response()->json($product, 200);
    } else {
        return response()->json(['mensaje' => 'Producto no encontrado'], 404);
    }
}


    public function getImage($imageName)
    {
        $path = public_path('images/' . $imageName);
        return response()->file($path);
    }
}
