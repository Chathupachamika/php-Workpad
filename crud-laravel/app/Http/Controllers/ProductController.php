<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $recycledCount = Product::onlyTrashed()->count();

        return view('products.index', compact('products', 'recycledCount'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        Product::create($validated);

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        $product->update($validated);

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product moved to recycle bin.');
    }

    public function recycleBin()
    {
        $recycledItems = Product::onlyTrashed()->get();
        $recycledCount = $recycledItems->count();

        return view('products.recycle-bin.index', compact('recycledItems', 'recycledCount'));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('product.recycle-bin')
            ->with('success', 'Product restored successfully.');
    }

    public function permanentDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();

        return redirect()->route('product.recycle-bin')
            ->with('success', 'Product permanently deleted.');
    }
}
