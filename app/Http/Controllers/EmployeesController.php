<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;
use App\Models\Departements;
use App\Models\User;

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
                'password'        => $request->password,
                ]);
            
        
        Employees::create([
            'first_name'      =>$request->first_name,
            'last_name'       =>$request->last_name,
            'phone'           =>$request->phone,
            'photo'           =>$request->photo,
            'company_id'      =>$request->company_id,
            'departement_id'  =>$request->departement_id,
            'user_id'         =>$users->id
        ]);
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
