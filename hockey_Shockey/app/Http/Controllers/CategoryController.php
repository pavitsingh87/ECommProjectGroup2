<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    //
    public function index()
    {
        // Fetch all categories from the database by Dipesh
        $categories = Category::all();


        
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        Category::create([
            'name' => $request->input('name'),
            // Add other fields as needed
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        // Fetch the category by ID
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);
    
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
            // Add other fields as needed
        ]);
    
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    
    }

    public function show($id)
    {
        // Fetch the category by ID
        $category = Category::findOrFail($id);

        return view('admin.category.show', compact('category'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');

    }
}
