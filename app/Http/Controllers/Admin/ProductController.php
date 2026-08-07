<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::latest();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('seller_name', 'like', '%' . $request->search . '%');
        }
        $products = $query->paginate(10)->withQueryString();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'              => 'required|string|max:255',
            'price'             => 'nullable|integer|min:0',
            'description'       => 'nullable|string',
            'images'            => 'nullable|array|max:10',
            'images.*'          => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'seller_name'       => 'nullable|string|max:255',
            'whatsapp_number'   => 'nullable|string|max:20',
            'social_media_link' => 'nullable|string|max:255',
            'ecommerce_link'    => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
            $data['images'] = $imagePaths;
        }

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'              => 'required|string|max:255',
            'price'             => 'nullable|integer|min:0',
            'description'       => 'nullable|string',
            'images'            => 'nullable|array|max:10',
            'images.*'          => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'seller_name'       => 'nullable|string|max:255',
            'whatsapp_number'   => 'nullable|string|max:20',
            'social_media_link' => 'nullable|string|max:255',
            'ecommerce_link'    => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('images')) {
            if (!empty($product->images)) {
                foreach ($product->images as $img) {
                    if (\Storage::disk('public')->exists($img)) \Storage::disk('public')->delete($img);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
            $data['images'] = $imagePaths;
        }

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if (!empty($product->images)) {
            foreach ($product->images as $img) {
                if (\Storage::disk('public')->exists($img)) \Storage::disk('public')->delete($img);
            }
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
