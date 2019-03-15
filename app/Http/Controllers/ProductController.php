<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Product;

class ProductController extends Controller
{
    /**
     * @var string
     */
    private $view_prefix = 'admin.products.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view($this->view_prefix . 'index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view($this->view_prefix . 'create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'url' => $request->url,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'purchase_price' => $request->purchase_price,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_tags' => $request->meta_tags,
            'in_stock' => $request->in_stock,
            'status' => $request->status
        ]);

        return redirect()->route('products.index')->with(['message' => 'Успешно добавлено']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::all();

        return view($this->view_prefix . 'edit', compact('product', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProductRequest $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'url' => $request->url,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'purchase_price' => $request->purchase_price,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_tags' => $request->meta_tags,
            'in_stock' => $request->in_stock,
            'status' => $request->status
        ]);

        return redirect()->route('pages.index')->with(['message' => 'Успешно обновлено']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with(['message' => 'Успешно удалено']);
    }
}
