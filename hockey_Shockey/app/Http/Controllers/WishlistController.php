<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function store($productId)
    {
        $user = auth()->user();

        // Check if the product is not already in the wishlist
        if (!$user->wishlist->contains('product_id', $productId)) {
            $user->wishlist()->create(['product_id' => $productId]);
            return redirect()->back()->with('success', 'Product added to your wishlist');
        }

        else{
                // Remove the product from the wishlist
                $user->wishlist()->where('product_id', $productId)->delete();
                return redirect()->back()->with('success', 'Product removed from your wishlist');
        }


    }

    public function show()
    {
        $wishlistItems = auth()->user()->wishlist()->with('product')->get();

        return view('wishlist.index', compact('wishlistItems'));
    }

    public function destroy(Wishlist $wishlistItem)
    {

        $wishlistItem->delete();

        return redirect()->back()->with('success', 'Product removed from your wishlist');
    }

    public function getWishlistCount()
    {
        if (Auth::check()) {
            $wishlistCount = Auth::user()->wishlist->count();
        } else {
            $wishlistCount = 0;
        }

        return response()->json(['count' => $wishlistCount]);
    }

}

