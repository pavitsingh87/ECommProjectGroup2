<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategoryType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        if (request()->is('admin/products')) {
            return view('admin.products.index', compact('products'));
        } else {
            $categories = ProductCategoryType::all();

            $selectedCategoryId = $request->input('category');
            $orderBy = $request->input('orderBy', 'default');
            $productsQuery = Product::query();

            if ($selectedCategoryId) {
                $productsQuery->where('product_category_type_id', $selectedCategoryId);
            }

            if ($orderBy == 'priceHighToLow') {
                $productsQuery->orderBy('price', 'desc');
            } elseif ($orderBy == 'priceLowToHigh') {
                $productsQuery->orderBy('price', 'asc');
            }


            $products = $productsQuery->paginate(21);

            return view('products.index', compact('products', 'categories','orderBy'));
        }
    }


    public function create()
    {
        $productCategories = ProductCategoryType::all();
        return view('admin.products.create', compact('productCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_image' => 'required',
            'price' => 'required|numeric',
            'availability_status' => 'required',
            'product_category_type_id' => 'required|numeric'
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $productCategories = ProductCategoryType::all();

        return view('admin.products.edit', compact('product', 'productCategories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_image' => 'required',
            'price' => 'required|numeric',
            'availability_status' => 'required',
            'product_category_type_id' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
