<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Auth;

class BarangController extends Controller
{
    public function getData()
    {
        $datas = Barang::get();
        return view('data-barang',compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
}