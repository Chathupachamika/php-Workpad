<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ItemsController extends Controller
{
    /**
     * Create a new item
     */
    public function postItem(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
            'description' => 'required|string'
        ]);

        $item = Items::create($validated);

        return response()->json([
            'message' => 'Item created successfully',
            'data' => $item
        ], 201);
    }

    /**
     * Get all items
     */
    public function getItems(): JsonResponse
    {
        $items = Items::all();
        return response()->json(['data' => $items]);
    }

    /**
     * Get a specific item
     */
    public function getItem($id): JsonResponse
    {
        $item = Items::findOrFail($id);
        return response()->json(['data' => $item]);
    }

    /**
     * Update an item
     */
    public function updateItem(Request $request, $id): JsonResponse
    {
        $item = Items::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',
            'price' => 'numeric',
            'qty' => 'integer',
            'description' => 'string'
        ]);

        $item->update($validated);

        return response()->json([
            'message' => 'Item updated successfully',
            'data' => $item
        ]);
    }

    /**
     * Delete an item
     */
    public function deleteItem($id): JsonResponse
    {
        $item = Items::findOrFail($id);
        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully'
        ]);
    }
}
