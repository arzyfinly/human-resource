<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Departements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = Departements::latest()->paginate(5);
        return view('admin.departements.departements', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
            $data = $request->all();
            Departements::create($data);
            return redirect('/departements')->with('success', 'Data berhasil ditambahkan');    
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departements = Departements::find($id);
        return view('admin.departements.departements', compact('departements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departements = Departements::find($id);
        return view('admin.departements.edit', compact('departements'));
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
        Departements::find($id)->update($request->all());
        return redirect('/departements')->with('success', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departements::find($id)->delete();
        return redirect('/departements')->with('success', 'Data berhasil dihapus');
    }
}
