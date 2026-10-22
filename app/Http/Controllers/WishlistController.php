<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Display Wishlist Products
    public function index()
    {
        $wishlist = session()->get('wishlist', []);

        $products = Product::whereIn('id', array_keys($wishlist))
            ->get();

        return view('wishlist.index', compact('products'));
    }

    // Add Product to Wishlist
    public function add(Product $product)
    {
        $wishlist = session()->get('wishlist', []);

        $wishlist[$product->id] = true;

        session()->put('wishlist', $wishlist);

        return redirect()->back()
            ->with('success', 'Product added to wishlist successfully!');
    }

    // Remove Product from Wishlist
    public function remove(Product $product)
    {
        $wishlist = session()->get('wishlist', []);

        unset($wishlist[$product->id]);

        session()->put('wishlist', $wishlist);

        return redirect()->back()
            ->with('success', 'Product removed from wishlist successfully!');
    }
}