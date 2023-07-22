<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->except('image');

        if ($request->image) {

            $image = $request->image;
            
            // $image = $request->image->store('Product','public');

            $file_name = $image->hashName();

            $image->move('Upload/Product', $file_name);

            $data['image'] = 'Upload/Product/' . $file_name;
        
        }

        // dd($data);

        Product::create($data);
        session()->flash('success', 'Data added successfully');
        // return redirect('/products');
        return redirect()->route('products.index');
        // return redirect()->to('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
       $data = $request->except('image');

        if ($request->image) {

            if(File::exists($product->image)) {
                File::delete($product->image);
            }

            $image = $request->image;
            
            // $image = $request->image->store('Product','public');

            $file_name = $image->hashName();

            $image->move('Upload/Product', $file_name);

            $data['image'] = 'Upload/Product/' . $file_name;
        }

        // dd($data);

        $product->update($data);
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(File::exists($product->image)) {
            File::delete($product->image);
        }

        $product->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('products.index');
    }
}
