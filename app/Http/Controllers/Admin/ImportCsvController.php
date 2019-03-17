<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use App\ImportCsv;
use App\Http\Requests\StoreImportCsvRequest;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Http\Request;
use Schema;

class ImportCsvController extends Controller
{
    /**
     * @var string
     */
    private $view_prefix = 'admin.exchange.import.csv.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->view_prefix . 'index');
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
     * @param StoreImportCsvRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImportCsvRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();

        $data = array_map('str_getcsv', file($path));
        $csv_data = array_slice($data,  0, 3);

        $product_model = new Product();
        $columns = Schema::getColumnListing($product_model->getTable());

        return view($this->view_prefix . 'store', compact('csv_data', 'columns'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImportCsv  $importCsv
     * @return \Illuminate\Http\Response
     */
    public function show(ImportCsv $importCsv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImportCsv  $importCsv
     * @return \Illuminate\Http\Response
     */
    public function edit(ImportCsv $importCsv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImportCsv  $importCsv
     * @return \Illuminate\Http\Response
     */
    public function update(StoreImportCsvRequest $request, ImportCsv $importCsv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImportCsv  $importCsv
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImportCsv $importCsv)
    {
        //
    }
}
