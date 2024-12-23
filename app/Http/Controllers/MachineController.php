<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;

class MachineController extends Controller
{
    protected $machine;
    public function __construct(Machine $machine){
        $this->machine=$machine;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('machine.index',[
            'title'=>'Machine'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = Validator::make($request->all(),[
            'code'=>'required|string|max:6|unique:machines,code',
            'equipment_name'=>'required|string|max:50'
        ],[
          'code.required'=>'Kode Wajib Diisi',
          'code.string'=>'Kode Wajib String',
          'code.max'=>'code Maksimum 6 Karakter',
          'code.unique'=>'Kode Sudah Digunakan',
          'equipment_name.required'=>'Nama Wajib Diisi',
          'equipment_name.string'=>'Nama Wajib String',
          'equipment_name.max'=>'Nama Maksimum 50 Karakter!'
        ]);
        if ($val->fails()) {
            return back()->withErrors($val)->with('failed','kesalahan input');
        }
        $this->machine->Store([
            'code'=>$request->code,
            'equipment_name'=>$request->equipment_name
        ]);
        return back()->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->machine->Show($id);
        return view('machine.show',[
            'title'=>$data->code,
            'data'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val=Validator::make($request->all(),[
            'code'=>'required|max:6',
            'equipment_name'=>'required|string|max:50'
        ],[
            'code.required'=>'Kode Wajib Diisi',
            'code.max'=>'code Maksimum 6 Karakter',
            'equipment_name.required'=>'Equipment Wajib Diisi',
            'equipment_name.string'=>'Equipment NAme Wajib String',
            'equipment_name.max'=>'Equipment Name Maksimum 50 Karakter!'
        ]);
        if($val->fails()){
            return back()->withErrors($val)->with('failed','Kesalahan Input!');
        }
        $this->machine->Edit($id,[
            'equipment_name'=>$request->equipment_name
        ]);
        return redirect('admin/machine')->with('success','Data Berhasil Diubah' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->machine->Trash($id);
        return back()->with('success','Data Berhasil Dihapus');
    }
    public function api(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->machine->index();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url = url('admin/machine/' . $row->id);
                    return
                    '<div class="d-flex">
                        <a href="' . $url . '" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <form action="' . $url . '" method="POST" class="delete-machine" data-id="' . $row->id . '">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="button" class="btn btn-danger btn-sm machine-button"><i class="bi bi-trash-fill"></i> Hapus</button>
                        </form>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    } 
}
