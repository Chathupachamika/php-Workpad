<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RecycleBin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Added this import

class RecycleBinController extends Controller
{
    public function moveToRecycleBin(Product $product)
    {
        DB::transaction(function () use ($product) {
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
    }

    public function restore($id)
    {
        try {
            $recycledItem = RecycleBin::findOrFail($id);

            DB::transaction(function () use ($recycledItem) {
                Product::withTrashed()
                    ->where('id', $recycledItem->product_id)
                    ->restore();

                $recycledItem->delete();
            });

            return redirect()
                ->route('product.recycle-bin')
                ->with('success', 'Product restored successfully');
        } catch (\Exception $e) {
            return redirect()
                ->route('product.recycle-bin')
                ->with('error', 'Error restoring product');
        }
    }

    public function permanentDelete($id)
    {
        try {
            $recycledItem = RecycleBin::findOrFail($id);

            DB::transaction(function () use ($recycledItem) {
                Product::withTrashed()
                    ->where('id', $recycledItem->product_id)
                    ->forceDelete();

                $recycledItem->delete();
            });

            return redirect()
                ->route('product.recycle-bin')
                ->with('success', 'Product permanently deleted');
        } catch (\Exception $e) {
            return redirect()
                ->route('product.recycle-bin')
                ->with('error', 'Error deleting product');
        }
    }

    public function index()
    {
        $recycledItems = RecycleBin::with('product')
            ->orderBy('deleted_at', 'desc')
            ->get();

        return view('recycle-bin.index', compact('recycledItems'));
    }

    public function show($id)
    {
        $recycledItem = RecycleBin::with('product')->findOrFail($id);
        return view('recycle-bin.show', compact('recycledItem'));
    }
}
