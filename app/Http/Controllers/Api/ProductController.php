<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'Laptop', 'price' => 1000],
        ['id' => 2, 'name' => 'Phone', 'price' => 500],
        ['id' => 3, 'name' => 'Tablet', 'price' => 300],
    ];

    public function index()
    {
        return response()->json($this->products);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);
        
        return response()->json(['message' => 'Product created', 'data' => $validated], 201);
    }

    public function show(string $id)
    {
        $product = collect($this->products)->firstWhere('id', (int)$id);
        return $product ? response()->json($product) : response()->json(['error' => 'Not found'], 404);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'string',
            'price' => 'numeric'
        ]);
        
        return response()->json(['message' => 'Product updated', 'id' => $id, 'data' => $validated]);
    }

    public function destroy(string $id)
    {
        return response()->json(['message' => 'Product deleted', 'id' => $id]);
    }
}
