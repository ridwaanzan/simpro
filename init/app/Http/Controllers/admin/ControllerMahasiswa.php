<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Jurusan;
use Datatables;

class ControllerMahasiswa extends Controller
{

    public function index(Request $request)
    {
        $jurusan = Jurusan::pluck('nama', 'id');

        return view('admin.mahasiswa', compact('mahasiswa', 'jurusan'));
    }

    public function loader()
    {
        $mahasiswa = Mahasiswa::orderBy('id', 'DESC')->get();

        $no = 0;
        $data = array();
        foreach($mahasiswa as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama;
            $row[] = $list->nim;
            $row[] = $list->id_jurusan;
            $row[] = '<button class="btn btn-primary">Edit</button> <button class="btn btn-danger">Delete</button>';
            $data[] = $row;
        }

        return Datatables::of($data)->escapeColumns([])->make(true);
    }

    public function store(Request $request)
    {
        if ($request->ajax())
        {
            $mahasiswa = new Mahasiswa;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->id_jurusan = $request->id_jurusan;
            $mahasiswa->save();

            return response($mahasiswa);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

   public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
