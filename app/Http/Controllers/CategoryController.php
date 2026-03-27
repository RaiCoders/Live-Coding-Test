<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // List kategori
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Form create kategori
    public function create()
    {
        return view('categories.create');
    }

    // Simpan kategori
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Form edit kategori
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update kategori
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($data);
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diupdate');
    }

    // Delete kategori
    public function destroy(Category $category)
    {
        $category->products()->detach();
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus');
    }
}