<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user){
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index',[
            'title'=>'User'
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
            'email'=>'required|max:30|unique:users,email',
            'name'=>'required|max:50',
            'role'=>'required',
            'password'=>'nullable|max:30'
        ],[
            'email.required'=>'Email Wajib Diisi!',
            'email.max'=>'Email Maksimum 30 Karakter',
            'email.unique'=>'Email Sudah Digunakan',
            'name.required'=>'Nama Wajib Diisi',
            'name.max'=>'Nama Maksimum 50 Karakter',
            'role.required'=>'Role Wajib Diisi',
            'password.max'=>'Password Maksimum 30 Karakter'
        ]);
        if ($val->fails()) {
            return back()->withErrors($val)->with('failed','Kesalahan Input!');
        }
        if ($request->password == null) {
            $password = $request->email;
        } else {
            $password = $request->password;
        }
        $this->user->Store([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>$password
        ]);
        return back()->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->user->Show($id);
        return view('user.show',[
            'title'=>$data->email,
            'data'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $val = Validator::make($request->all(),[
            'email'=>'required|max:30',
            'name'=>'required|max:50',
            'role'=>'required',
            'password'=>'nullable|max:30'
        ],[
            'email.required'=>'Email Wajib Diisi!',
            'email.max'=>'Email Maksimum 30 Karakter',
            'name.required'=>'Nama Wajib Diisi',
            'name.max'=>'Nama Maksimum 50 Karakter',
            'role.required'=>'Role Wajib Diisi',
            'password.max'=>'Password Maksimum 30 Karakter'
        ]);
        if ($val->fails()) {
            return back()->withErrors($val)->with('failed','Kesalahan Input!');
        }
        $this->user->Edit($id,[
            'email'=>$request->email,
            'name'=>$request->name,
            'role'=>$request->role
        ]);
        return redirect('admin/user')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function ubahPassword(Request $request, $id){
        $val = Validator::make($request->all(),[
            'password'=>'required|min:8|max:20'
        ],[
            'password.required'=>'Password Wajib Diisi',
            'password.min'=>'Password Minimum 8 Karakter',
            'password.max'=>'Password Maksimum 20 Karakter'
        ]);
        if ($val->fails()) {
            return back()->withErrors($val)->with('failed','Kesalahan Input!');
        }
        $this->user->Edit($id,[
            'password'=>Hash::make($request->password)
        ]);
        return redirect('admin/user')->with('success','Password Berhasil Diubah');
    }
    public function api(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->user->index();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('role',function($row){
                    switch ($row->role) {
                        case 'admin':
                            return '<button class="btn btn-outline-primary btn-sm">Admin</button>';
                        case 'user':
                            return '<button class="btn btn-outline-danger btn-sm">User</button>';
                        case 'supplier':
                            return '<button class="btn btn-outline-info btn-sm">Supplier</button>';
                        default:
                            return '<button class="btn btn-outline-success btn-sm">Manager</button>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $url = url('admin/user/' . $row->id);
                    return
                    '<div class="d-flex">
                        <a href="' . $url . '" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <form action="' . $url . '" method="POST" class="delete-user" data-id="' . $row->id . '">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="button" class="btn btn-danger btn-sm user-button"><i class="bi bi-trash-fill"></i> Hapus</button>
                        </form>
                    </div>';
                })
                ->rawColumns(['action','role'])
                ->make(true);
        }
    } 
}
