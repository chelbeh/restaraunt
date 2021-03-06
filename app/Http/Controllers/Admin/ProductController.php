<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\StoreProductRequest;
use App\Product;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller {

    /**
     * @var string
     */
    private $view_prefix = 'admin.products.';


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::all();

        return view($this->view_prefix . 'index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();

        return view($this->view_prefix . 'create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequest  $request
     *
     * @return Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'url' => $request->url,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'purchase_price' => $request->purchase_price,
            'description' => $request->description,
            'portion' => $request->portion,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_tags' => $request->meta_tags,
            'in_stock' => $request->has('in_stock'),
            'status' => $request->has('status')
        ]);

        $product->categories()->sync([$request->category_id]);

        return redirect()->route('products.index')->with(['message' => 'Успешно добавлено']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     *
     * @return Response
     */
    public function show(Product $product)
    {
        return view($this->view_prefix . 'show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     *
     * @return Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view($this->view_prefix . 'edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreProductRequest  $request
     * @param  Product  $product
     *
     * @return \Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'url' => $request->url,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'purchase_price' => $request->purchase_price,
            'description' => $request->description,
            'portion' => $request->portion,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_tags' => $request->meta_tags,
            'in_stock' => $request->has('in_stock'),
            'status' => $request->has('status')
        ]);

        $product->categories()->sync([$request->category_id]);

        return $this->redirectBackWithMessage('info', 'успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     *
     * @return Response
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with(['message' => 'Успешно удалено']);
    }

    /**
     * Remove checked resources from storage.
     *
     * @param  Request  $request
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function massDestroy(Request $request)
    {
        $products = explode(',', $request->input('ids'));

        foreach ($products as $page_id) {
            $product = Product::findOrFail($page_id);
            $product->delete();
        }

        return redirect()->route('pages.index')->with(['message' => 'Успешно удалено']);
    }
}
