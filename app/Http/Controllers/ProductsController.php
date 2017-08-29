<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        return Product::orderby('created_at', 'desc')->get();
    }

    public function store(Request $request) {

        $exploded = explode(',', $request->image);
        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg'))
            $extension = 'jpg';

        else
            $extension = 'png';

        $fileName = str_random().'.'.$extension;
        $path = public_path().'/'.$fileName;

        file_put_contents($path, $decoded);

//        \Log::info($request->all());

        $product = Product::create($request->except('imagePath') + [
            'user_id' => Auth::id(),
            'imagePath' => $fileName
            ]);

        return $product;
    }

    public function destroy($id) {
        try {
            Product::destroy($id);
            return response([], 204);
        } catch (\Exception $e) {
            return response(['Porblem deleting the product. Try again',500]);
        }
    }

    public function show($id) {
        $product = Product::find($id);

        if (count($product) > 0)
            return response()->json($product);
        return response(['error' => 'Resources not found!'], 404);
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);

        $product->update($request->all());

        return response()->json($product);
    }
}
