<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategoryType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Load products with the related productCategoryType
        $products = Product::with('productCategoryType')->get();

        // Check if the request is for the admin/products route
        if (request()->is('admin/products')) {
            return view('admin.products.index', compact('products'));
        } else {
            // Load product categories
            $categories = ProductCategoryType::all();

            // Get selected category and order by values from the request
            $selectedCategoryId = $request->input('category');
            $orderBy = $request->input('orderBy', 'default');

            // Start building the products query
            $productsQuery = Product::query();

            // Filter products by selected category
            if ($selectedCategoryId) {
                $productsQuery->where('product_category_type_id', $selectedCategoryId);
            }

            // Order products based on the selected order by value
            if ($orderBy == 'priceHighToLow') {
                $productsQuery->orderBy('price', 'desc');
            } elseif ($orderBy == 'priceLowToHigh') {
                $productsQuery->orderBy('price', 'asc');
            }

            // Paginate the results
            $products = $productsQuery->paginate(21);

            // Return the view with products, categories, and orderBy values
            return view('products.index', compact('products', 'categories', 'orderBy'));
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

    public function show($category, $name)
    {
        // Logic to retrieve the product by category and name
        $product = Product::whereHas('productCategoryType', function ($query) use ($category) {
            $query->where('pct_name', $category);
        })->where('product_name', $name)->first();

        // Check if the product is found
        if (!$product) {
            abort(404); // Or redirect to a 404 error page
        }

        // Determine the view path based on the request
        $viewPath = request()->is('admin/*') ? 'admin.products.show' : 'products.show';

        // Pass the product to the view
        return view($viewPath, compact('product'));
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
