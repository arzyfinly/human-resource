<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;
use App\Models\Departements;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

use function GuzzleHttp\Promise\all;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
        $employees = Employees::latest()->paginate(5);
        return view('admin.employees.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::all();
        $departements = Departements::all();

        return view('admin.employees.create', compact('companies','departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::create([
                'name'            => $request->first_name.' '.$request->last_name,
                'username'        => $request->username,
                'email'           => $request->email,
                'password'        => Hash::make($request->password),
                ]);

        $employees = Employees::create([
            'first_name'      =>$request->first_name,
            'last_name'       =>$request->last_name,
            'phone'           =>$request->phone,
            'company_id'      =>$request->company_id,
            'departement_id'  =>$request->departement_id,
            'user_id'         =>$users->id
        ]);
        if($request->file('photo')){
            $file = $request->file('photo');
            $nama_file = time().str_replace(" ","", $file->getClientOriginalName());
            $file->move('image', $nama_file);
            $data['photo']=$nama_file;
        }
        return redirect('/employees')->with('success','data berhasil disimpan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employees::find($id);
        $user_id = Employees::select('user_id')->where('id', $id)->first();
        $user = User::findOrFail($user_id)->first();
        $companies = Companies::all();
        $departements = Departements::all();
        return view('admin.employees.edit', compact(
            'employee', 'user', 'companies', 'departements'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $data = $request->all();
        if($request->file('photo')){
            $file = $request->file('photo');
            $nama_file = time().str_replace(" ","", $file->getClientOriginalName());
            $file->move('image', $nama_file);
            $data['photo']= $nama_file;
            Employees::find($user_id)->update($data);
            User::find($user_id)->update($data);
        }
        return redirect('/employees')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        User::find($user_id)->delete();
        return redirect('/employees')->with('success', 'Data berhasil dihapus');
    }
}
