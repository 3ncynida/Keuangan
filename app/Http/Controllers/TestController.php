<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
public function index()
    {
        $dataTabungan = mytabungan::all();
        return view('tabungan.index', compact('dataTabungan'));
    }
}
