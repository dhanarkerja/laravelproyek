<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Auth;

class BarangController extends Controller
{
    public function getDataDash()
    {
        $datas = Barang::get();
        return view('dashboard',compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
    public function getData()
    {
        $data = Barang::all();
        return view('data-barang-read')->with([
            'data' => $data
        ]);
    }
    public function create()
    {
        return view('data-barang-create');
    }
    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $data['quantity'] = $request->quantity;
        $data['added_by'] = Auth::user()->name;
        Barang::create($data);
       
    }
    public function show($id)
    {
        $data = Barang::find($id);
        return view('data-barang-edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = Barang::find($id);
        $data->name = $request->name;
        $data->quantity = $request->quantity;
        $data->save();
    }
    public function destroy($id)
    {
        $data = Barang::findOrFail($id);
        $data->delete();
    }

    public function search($request)
    {
        $data = Barang::where('name','LIKE','%'.$request.'%')->get();
        return view('data-barang-read')->with([
            'data' => $data
        ]);
    }

}