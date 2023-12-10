<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    //
    public function index()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new category
        // ...

        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        // Fetch the category by ID
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the category
        // ...

        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        // Fetch the category by ID
        $category = Category::findOrFail($id);

        return view('admin.category.show', compact('category'));
    }

    public function destroy($id)
    {
        // Delete the category
        // ...

        return redirect()->route('admin.category.index');
    }
}
