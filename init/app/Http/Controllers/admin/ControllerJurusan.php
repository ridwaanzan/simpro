<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jurusan;
use Datatables;

class ControllerJurusan extends Controller
{

    public function index(Request $request)
    {
        return view('admin.jurusan.jurusan');
    }

    public function loader()
    {
        $jurusan = Jurusan::all();

        $no = 0;
        $data = array();
        foreach($jurusan as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama;
            $row[] = date($list->created_at);
            $row[] = "<a class='btn btn-primary'>Ubah</a>";
            $data[] = $row;
        }

        return Datatables::of($data)->escapeColumns([])->make(true);
    }

    public function store(Request $request)
    {
        if($request->ajax()) {
            $jurusan = new Jurusan;
            $jurusan->nama = $request->nama;
            $jurusan->save();

            return response($jurusan);
        }

    }

    public function show($id)
    {
        $jurusan = Jurusan::find($id);
        return response($jurusan);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $req)
    {        
        if ($req->ajax()) {
            $jurusan = Jurusan::find($req->id);
            $jurusan->nama = $req->nama;
            $jurusan->update();

            return response()->json($jurusan);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        if ($req->ajax()) {
            Jurusan::destroy($req->id);
            return response()->json();
        }

    }
}
