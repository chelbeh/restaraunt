<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Response;

class CategoryController extends Controller {

    /**
     * @var string
     */
    private $view_prefix = 'admin.categories.';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();

        return view($this->view_prefix . 'index', compact('categories'));
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
     * @param  StoreCategoryRequest  $request
     *
     * @return Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'url' => $request->url,
        ], Category::find($request->parent_id));

        return redirect()->route('categories.index')->with(['message' => 'Успешно добавлено']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     *
     * @return Response
     */
    public function show(Category $category)
    {
        return view($this->view_prefix . 'show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     *
     * @return Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();

        return view($this->view_prefix . 'edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreCategoryRequest  $request
     * @param  Category  $category
     *
     * @return \Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'url' => $request->url,
            'parent_id' => $request->parent_id
        ]);

        return $this->redirectBackWithMessage('info', 'успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     *
     * @return \Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return $this->redirectBackWithMessage('info', 'успешно удалено');
    }
}
