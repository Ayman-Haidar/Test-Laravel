<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request, Product $product) {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
        $product ->create($validated);
    }

    public function update(Request $request,Product $product) {
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'sometimes|nullable|string',
            'price' => 'sometimes|required|numeric',
            'quantity' => 'sometimes|required|integer',
        ]);
        $product ->update($validated);
        return $product;
    }
    public function destroy(Product $product) {
            $product ->delete();
            return $product;
        }
         public function show(Product $product) {
            return $product;
        }

        public function index() {
             $products = Product::query()->get();
             return $products;
         }

         public function reduceStock(Request $request, Product $product)
{
             $validated = $request->validate([
                    'amount' => 'required|integer|min:1',
            ]);

             $product->quantity -= $validated['amount'];
             $product->save();

              return $product;
}

}
