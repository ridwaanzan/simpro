<?php

namespace App\Http\Controllers\admin\project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Datatables;
use Validator;
use ProjectMaster;
use ProjectDetail;

class ProjectMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.project.master.index');
    }

    public function getData()
    {
        $project    = ProjectMaster::orderBy('id', 'desc')->get();
        $no         = 0;
        $id         = [];

        foreach ($project as $pm) {
            $count  = ProjectDetail::where([['project_master_id', '=', $pm->id], ['status', '=', '1']])->get()=>count();
            $row    = array();
            $row[]  = $no;
            $row[]  = $pm->nama_project;
            if ($pm->jumlah_modul == '') {
                $row[]  = '0 Project';
            } else {
                $row[]  = $pm->jumlah_modul.' Project';
            }
            if ($count > 0) {
                
            } else {
                
            }
            if ($pm->status == '1') {
                $row[]  = 'Done';
            } elseif($pm->status == '2') {
                $row[]  = 'Progress';
            } elseif($pm->status == '3') {
                $row[]  = 'Pending';
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
