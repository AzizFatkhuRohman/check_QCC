<?php

namespace App\Http\Controllers;

use App\Models\DeTable;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('de.index',[
            'title'=>'Tabel DE'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('de.create',[
            'title'=>'Buat DE'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DeTable $deTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeTable $deTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeTable $deTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeTable $deTable)
    {
        //
    }
    public function api(Request $request){
        if ($request->ajax()) {
            if (Auth::user()->role == 'supplier') {
                $data = DeTable::where('supplier_id',Auth::user()->id)->latest();
            } elseif (Auth::user()->role == 'user') {
                $data = DeTable::where('prepare_id',Auth::user()->id)->latest();
            } else{
                $data = DeTable::latest();
            }
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $url = url(Auth::user()->role.'/tabel-de/'.$row->id);
                return '<div class="d-flex">
                <a href="'.$url.'"><i class="bi bi-eye-fill"></i> Detail</a>
                <form action="'.$url.'" method="post" id="formDe">
                '.csrf_field().'
                '.method_field('DELETE').'
                <button type="button" onclick="deleteDe()"><i class="bi bi-trash-fill"></i> Hapus</button>
                </form>
                </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
}
