<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePageRequest;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * @var string
     */
    private $view_prefix = 'admin.pages.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view($this->view_prefix . 'index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();

        return view($this->view_prefix . 'create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        Page::create([
            'name' => $request->name,
            'url' => $request->url,
            'body' => $request->body
        ]);

        return redirect()->route('pages.index')->with(['message' => 'Успешно добавлено']);
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @return void
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $pages = Page::all();

        return view($this->view_prefix . 'edit', compact('page', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePageRequest $request
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(StorePageRequest $request, Page $page)
    {
        $page->update([
            'name' => $request->name,
            'url' => $request->url,
            'body' => $request->body
        ]);


        return redirect()->back()->with(['message' => ['type' => 'danger', 'text' => 'успешно обновлено']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index')->with(['message' => 'Успешно удалено']);
    }

    /**
     * Remove checked resources from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function massDestroy(Request $request)
    {
        $pages = explode(',', $request->input('ids'));

        foreach ($pages as $page_id) {
            $page = Page::findOrFail($page_id);
            $page->delete();
        }

        return redirect()->route('pages.index')->with(['message' => 'Успешно удалено']);
    }
}
