<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $productCategories = ProductCategoryType::all(); 
        return view('admin.products.create', compact('productCategories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size
            'price' => 'required|numeric',
            'availability_status' => 'required',
            'product_category_type_id' => 'required|numeric'
        ]);

        $directory = 'images/product_images';
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        // Handle file upload
        $imagePath = $request->file('product_image')->store($directory, 'public');

        // Create a new product instance
        $product = new Product([
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'product_image' => $imagePath, // Save the file path in the database
            'price' => $request->input('price'),
            'availability_status' => $request->input('availability_status'),
            'product_category_type_id' => $request->input('product_category_type_id'),
        ]);

        // Save the product to the database
        $product->save();

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
            'price' => 'required|numeric',
            'availability_status' => 'required',
            'product_category_type_id' => 'required|numeric',
        ]);
    
        // Handle image upload
        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image file
            ]);
    
            // Delete the old image if it exists
            Storage::disk('public')->delete($product->product_image);
    
            // Store the new image and update the product_image field
            $product->update([
                'product_image' => $request->file('product_image')->store('product_images', 'public'),
            ]);
        }
    
        // Update other product data
        $product->update([
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'price' => $request->input('price'),
            'availability_status' => $request->input('availability_status'),
            'product_category_type_id' => $request->input('product_category_type_id'),
        ]);
    
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function search(Request $request)
    {
        // Perform the search based on the user input
        $query = $request->input('query');
        $results = Product::where('product_name', 'like', "%$query%")->get();

        return response()->json($results);
    }
    public function showProducts()
    {
        // Fetch the products from the database
        $products = Product::take(6)->get();
        return $products;
        // Pass the products to the view
        //return view('home', compact('products'));
    }
}
