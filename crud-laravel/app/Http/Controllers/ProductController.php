<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RecycleBin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $DATA = $request->validate([
            'name'  => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable'
        ]);

        $newProduct = Product::create($DATA);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $DATA = $request->validate([
            'name'  => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($DATA);

        return redirect()
            ->route('product.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                // Move to recycle bin
                RecycleBin::create([
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'qty' => $product->qty,
                    'price' => $product->price,
                    'description' => $product->description,
                    'deleted_at' => now()
                ]);

                $product->delete();
            });

            return redirect()
                ->route('product.index')
                ->with('success', 'Product moved to recycle bin');
        } catch (\Exception $e) {
            return redirect()
                ->route('product.index')
                ->with('error', 'Error moving product to recycle bin');
        }
    }
}
