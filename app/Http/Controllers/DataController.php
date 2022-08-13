<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class DataController extends Controller
{
    public function getData()
    {
        $datas = Admin::get();
        return view('data-admin',compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
    public function deleteData(Admin $id) 
    {
        $id->delete();
       
        return redirect()->route('admin');
    }
    public function geteditData($id) // untuk route web halaman edit data
    {
        $data = Admin::find($id);
        return view('data-edit',compact('data'));
    }
    public function updateData(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = Admin::find($id);
        $data->update($request->all());
      
        return redirect()->route('admin');
    }
}
