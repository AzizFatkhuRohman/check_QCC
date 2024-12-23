<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;

class LineController extends Controller
{
    protected $line;
    public function __construct(Line $line){
        $this->line=$line;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('line.index',[
            'title'=>'Line'
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
            'name'=>'required|string|max:50|unique:lines,name',
        ],[
            'name.required'=>'Nama Wajib Diisi',
            'name.string'=>'Nama Wajib String',
            'name.max'=>'Nama Maksimum 50 Karakter'
        ]);
        if ($val->fails()){
            return back()->withErrors($val)->with('failed','Kesalahan Input');
        }
        $this->line->Store([
            'name'=>$request->name
        ]);
        return back()->with('success','Data Berhasil Diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=$this->line->Show($id);
        return view('line.show',[
            'title'=>$data->name,
            'data'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Line $line)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(),[
            'name'=>'required|string|max:50'
        ],
            [
                'name.required'=>'Nama Wajib Diisi',
                'name.string'=>'Nama Wajib String',
                'name.max'=>'Nama MAksimum 50 Karakter'
            ]);
            if($val->fails()){
                return back()->withErrors($val)->with('failed','Kesalahan Input');
            }
            $this->line->Edit($id,[
                'name'=>$request->name
            ]);
            return redirect('admin/line')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->line->Trash($id);
        return back()->with('success','Data Berhasil Dihapus');
    }
    public function api(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->line->index();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url = url('admin/line/' . $row->id);
                    return
                    '<div class="d-flex">
                        <a href="' . $url . '" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <form action="' . $url . '" method="POST" class="delete-line" data-id="' . $row->id . '">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="button" class="btn btn-danger btn-sm line-button"><i class="bi bi-trash-fill"></i> Hapus</button>
                        </form>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    } 
}
