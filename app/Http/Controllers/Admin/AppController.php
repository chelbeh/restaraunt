<?php

namespace App\Http\Controllers\Admin;

use App\App;
use App\Http\Requests\StoreAppRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Response;

class AppController extends Controller {

    /**
     * @var string
     */
    private $view_prefix = 'admin.apps.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = App::all();

        return view($this->view_prefix . 'index', compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view_prefix . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAppRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppRequest $request)
    {
        App::create([
            'name' => $request->name,
            'url' => $request->url
        ]);

        return redirect()->route('apps.index')->with(['message' => 'Успешно добавлено']);
    }

    /**
     * Display the specified resource.
     *
     * @param  App  $app
     *
     * @return \Illuminate\Http\Response
     */
    public function show(App $app)
    {
        return view($this->view_prefix . 'show', compact('app'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App  $app
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(App $app)
    {
        $apps = App::all();

        return view($this->view_prefix . 'edit', compact('app', 'apps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreAppRequest  $request
     * @param  App  $app
     *
     * @return Response
     */
    public function update(StoreAppRequest $request, App $app)
    {
        $app->update([
            'name' => $request->name,
            'url' => $request->url
        ]);

        return $this->redirectBackWithMessage('info', 'успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App  $app
     *
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function destroy(App $app)
    {
        $app->delete();

        return redirect()->route('apps.index')->with(['message' => 'Успешно удалено']);
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
        $apps = explode(',', $request->input('ids'));

        foreach ($apps as $app_id) {
            $app = App::findOrFail($app_id);
            $app->delete();
        }

        return redirect()->route('apps.index')->with(['message' => 'Успешно удалено']);
    }
}
