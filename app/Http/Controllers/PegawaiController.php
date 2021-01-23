<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class PegawaiController extends Controller
{
    public function index(){
        return Pegawai::all();
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|unique:pegawais',
            'alamat' => 'required',
        ]);
        Pegawai::create($request->except('_token'));
        return "Data Diupload";
    }

    public function update(Request $request, Pegawai $pegawai){
        $this->validate($request,[
            'name' => 'required|string|unique:pegawais',
            'alamat' => 'required',
        ]);
        $pegawai->update($request->except('_token'));
        return "Data Diupdate";
    }

    public function delete($id){
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return "Data Dihapus";
    }
}
