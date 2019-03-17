<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index'); // TODO real exchange methods
    }
}
