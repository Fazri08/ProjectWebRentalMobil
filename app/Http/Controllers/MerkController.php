<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index()
    {
        $data['result'] = \App\Merk::all();
        return view('merk.index')->with($data);
    }

    public function create()
    {
        return view('merk.form');
    }

    public function store(Request $request)
    {

        $rules = [
            'nama_merk' => 'required|max:100', 
        ];
        $this->validate($request, $rules);

        $input = $request->all();
        $status = \App\Merk::create($input);

        if ($status) return redirect('merk')->with('succes', 'Data berhasil ditambahkan');
        else return redirect('merk')->with('error', 'Data gagal di tambah');
    }

    public function edit($id)
    {
        $data['result'] = \App\Merk::where('id_merk', $id)->first();
        return view('merk.form')->with($data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_merk' => 'required|max:100', 
        ];

        $this->validate($request, $rules);

        $input = $request->all();
        $result = \App\Merk::where('id_merk', $id)->first();
        $status = $result->update($input);

        if ($status) return redirect('merk')->with('success', 'Data berhasil ditambahkan');
        else return redirect('merk')->with('error', 'Data gagal ditambahkan');

    }

    public function destroy($id)
    {
        $result = \App\Merk::where('id_merk', $id)->first();
        $status = $result->delete();

        if ($status) return redirect('merk')->with('success', 'Data berhasil di hapus');
        else return redirect('merk')->with('error', 'Data gagal di hapus');
    }
}
