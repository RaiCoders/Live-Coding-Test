<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk beserta kategorinya
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('products.index', compact('products'));
    }

    // Form untuk create produk baru
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'categories' => 'array|exists:categories,id'
        ]);

        $product = Product::create($data);
        $product->categories()->sync($data['categories'] ?? []);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Form untuk edit produk
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('categories');
        return view('products.edit', compact('product', 'categories'));
    }

    // Update produk
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'categories' => 'array|exists:categories,id'
        ]);

        $product->update($data);
        $product->categories()->sync($data['categories'] ?? []);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate');
    }

    // Delete produk
    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}