<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function index(Request $request)
    {

        // Load products with the related productCategoryType
        $products = Product::with('productCategoryType')->get();
        $categories = ProductCategoryType::withCount('products')->get();


        // Check if the request is for the admin/products route
        if (request()->is('admin/products')) {
            return view('admin.products.index', compact('products'));
        } else {
            // Load product categories
            // $categories = ProductCategoryType::all();
            $categories = ProductCategoryType::withCount('products')->get();

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
        // Validate the request
        $request->validate([
            'product_name' => ['required','string', 'max:255'],
            'product_description' => ['required','string', 'max:255'],
            'short_description' => ['required','string', 'max:255'],
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
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
            'short_description' => $request->input('short_description'),
            'product_image' => $imagePath, // Save the file path in the database
            'price' => $request->input('price'),
            'availability_status' => $request->input('availability_status'),
            'product_category_type_id' => $request->input('product_category_type_id'),
        ]);

        // Save the product to the database
        $product->save();

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
            'product_name' => ['required','string', 'max:255'],
            'product_description' => ['required','string', 'max:255'],
            'short_description' => ['required','string', 'max:255'],
            'price' => ['required','numeric'],
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
            'short_description' => $request->input('short_description'),
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
