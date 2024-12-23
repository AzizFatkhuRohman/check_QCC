<?php

namespace App\Http\Controllers;

use App\Models\CarType;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;

class CarTypeController extends Controller
{
    protected $carType;
    public function __construct(CarType $carType){
        $this->carType=$carType;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('car-type.index',[
            'title'=>'Car Type'
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = Validator::make($request->all(),[
            'code'=>'required|string|max:6|unique:car_types,code',
            'name'=>'required|string|max:50'
        ],[
            'code.required'=>'Kode wajib Diisi!',
            'code.string'=>'Kode wajib string!',
            'code.max'=>'Kode maksimum 6 karakter',
            'code.unique'=>'Kode sudah digunakan!',
            'name.required'=>'Nama Wajib Diisi!',
            'name.string'=>'Nama wajib string!',
            'name.max'=>'Nama Maksimum 50 Karakter!'
        ]);
        if ($val->fails()) {
            return back()->withErrors($val)->with('failed','Kesalahan Input!');
        }
        $this->carType->Store([
            'code'=>$request->code,
            'name'=>$request->name
        ]);
        return back()->with('success','Data berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->carType->Show($id);
        return view('car-type.show',[
            'title'=>$data->code,
            'data'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarType $carType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(),[
            'code'=>'required|max:10',
            'name'=>'required|string|max:50'
        ],[
            'code.required'=>'Kode Wajib Diisi!',
            'code.max'=>'Kode Maksimum 10 Karakter!',
            'name.required'=>'Nama Wajib Diisi!',
            'name.string'=>'Nama wajib string!',
            'name.max'=>'Nama Maksimum 50 Karakter!'
        ]);
        if ($val->fails()) {
            return back()->withErrors($val)->with('failed','Kesalahan Input!');
        }
        $this->carType->Edit($id,[
            'code'=>$request->code,
            'name'=>$request->name
        ]);
        return redirect('admin/car-type')->with('success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->carType->Trash($id);
        return back()->with('success','Data berhasil dihapus!');
    }
    public function api(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->carType->index();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url = url('admin/car-type/' . $row->id);
                    return
                    '<div class="d-flex">
                        <a href="' . $url . '" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <form action="' . $url . '" method="POST" class="delete-form" data-id="' . $row->id . '">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="button" class="btn btn-danger btn-sm delete-button"><i class="bi bi-trash-fill"></i> Hapus</button>
                        </form>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }    
}
