<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();
        return view('products.product', compact('products'));
    }

    public function createForm()
    {
        return view('products.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric', 
            'weight' => 'required|numeric',
            'condition' => 'required|in:baru,bekas',
            'description' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'image' => 'images/'.$imageName,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock, 
            'weight' => $request->weight,
            'condition' => $request->condition,
            'description' => $request->description,
        ]);

        return redirect()->route('products.product')->with('success', 'Product added successfully.');
    }

    //list all products
    public function listProduct(Request $request)
    {
        $query = Product::query();

        if ($request->has('condition') && $request->condition) {
            $query->where('condition', $request->condition);
        }

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

        return view('products.listproduct', compact('products'));
    }


    //delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        $product->delete();

        return redirect()->route('products.listproduct')->with('success', 'Product deleted successfully.');
    }

    //edit a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
            'condition' => 'required|in:baru,bekas',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = 'images/'.$imageName;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'condition' => $request->condition,
            'description' => $request->description,
        ]);

        return redirect()->route('products.listproduct')->with('success', 'Product updated successfully.');
    }

    //detail a product
    public function detailProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('products.detailproduct', compact('product'));
    }

}
