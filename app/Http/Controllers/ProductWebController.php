<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductWebController extends Controller
{
   public function index(Request $request)
{
    $products = Product::query()
        ->when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })
        ->paginate(3);

    return view('products.index', compact('products'));
}

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    // dd($request->all());


    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category' => 'required|in:Electronics,Clothes,Accessories',
        'description' => 'nullable|string',
    ]);

    Product::query()->create([
        'name' => $request->name,
        'price' => $request->price,
        'category' => $request->category,
        'description' => $request->description,
    ]);

    return redirect()->route('products');

}
}
