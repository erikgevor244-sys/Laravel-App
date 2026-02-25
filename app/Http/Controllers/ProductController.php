<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function dashboard()
    {
        $products = Product::with('user')->latest()->get();
        $user_role = auth()->user()->role;
        
        return view('dashboard', compact('products', 'user_role'));
    }

    public function create()
    {
        $user_role = auth()->user()->role;
        return view('products.add_product', compact('user_role'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            ...$validated,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $this->authorize('view', $product);
        
        $user_role = auth()->user()->role;
        return view('products.edit_product', compact('product', 'user_role'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);

        return redirect()->route('dashboard')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
} 