<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use App\Merk;
class MobilController extends Controller
{
    public function index()
    {
        $data['result'] = \App\Mobil::all();
        return view('mobil/index')->with($data);
    }

    public function create()
    {
        return view('mobil.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'id_mobil' => 'required',
            'nama_mobil' => 'required|max:100',
            'tahun' => 'required',
            'kapasitas' => 'required',
            'transmition' => 'required',
            'id_merk' => 'required',
            'foto' => 'required'
        ];

        $this->validate($request, $rules);

        $input = $request->all();
        // if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
        //     $filename = $input['id_mobil']. "." .$request->file('foto')->getClientOriginalExtension();
        //     $request->file('foto')->storeAs($filename, $filename);
        //     $input['foto'] = $filename;
        // }
        if($request->file('foto')){
            $foto = $request->file('foto')->store('foto_mobil', 'public');
            $input['foto'] = $foto;
        }
        $status = \App\Mobil::create($input);

        if ($status) return redirect('mobil')->with('success', 'Data berhasil ditambahkan');
        else return redirect('mobil')->with('error', 'Data gagal ditambahkan');
    }

    public function edit($id)
    {
        $data['result'] = \App\Mobil::where('id_mobil', $id)->first();
        return view('mobil.form')->with($data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_mobil' => 'required|max:100',
            'tahun' => 'required',
            'kapasitas' => 'required',
            'transmition' => 'required',
            'id_merk' => 'required',
            'foto' => 'required'
        ];

        $this->validate($request, $rules);

        $input = $request->all();
        $result = \App\Mobil::where('id_mobil', $id)->first();
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $filename = $input['id_mobil']. "." .$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs($filename, $filename);
            $input['foto'] = $filename;
        }
        $status = $result->update($input);

        if ($status) return redirect('mobil')->with('success', 'Data berhasil diupdate');
        else return redirect('mobil')->with('error', 'Data gagal diupdate');

    }

    public function destroy($id)
    {
        $result = \App\Mobil::where('id_mobil', $id)->first();
        $status = $result->delete();

        if ($status) return redirect('mobil')->with('success', 'Data berhasil di hapus');
        else return redirect('mobil')->with('error', 'Data gagal di hapus');
    }

    public function shop()
    {
        $data['result'] = \App\Mobil::paginate(6);
        $data['merk'] = \App\Merk::all();
        return view('layouts/shop')->with($data);
    }


    public function findById($id_merk)
    {
        $data['result'] = \App\Mobil::where('id_merk','=', $id_merk)->get();
        $data['merk'] = \App\Merk::all();

        return view('layouts/shopmerek')->with($data);;
    }
}
