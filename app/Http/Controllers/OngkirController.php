<?php

namespace App\Http\Controllers;

use App\Models\ongkir;
use App\Http\Requests\StoreongkirRequest;
use App\Http\Requests\UpdateongkirRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ongkirs = DB::table('ongkirs')->get();
        return view('Admin.ongkir.index',['ongkirs' => $ongkirs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.ongkir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ongkir' => 'required',
            'harga_ongkir' =>'required',
            'created_at' => now(),
        ]);

        $ongkirs = DB::table('ongkirs')->insert($validatedData);
        if($ongkirs){
            return redirect()->route('ongkir.index')->with('success','Ongkir has been created');
        }else{
            return redirect()->route('ongkir.index')->with('error','Ongkir has not been created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ongkir $ongkir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ongkirs = DB::table('ongkirs')->where('id_ongkir','=',$id)->first();
        return view('Admin.ongkir.update',['ongkirs' => $ongkirs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_ongkir' => 'required',
            'harga_ongkir' =>'required',
            'created_at' => now(),
        ]);

        $ongkirs = DB::table('ongkirs')->where('id_ongkir','=',$id)->update($validatedData);
        if($ongkirs){
            return redirect()->route('ongkir.index')->with('success','Ongkir has been updated');
        }else{
            return redirect()->route('ongkir.index')->with('error','Ongkir has not been updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ongkirs = DB::table('ongkirs')->where('id_ongkir','=',$id)->delete();
        if($ongkirs){
            return redirect()->route('ongkir.index')->with('success','Ongkir has been deleted');
        }else{
            return redirect()->route('ongkir.index')->with('error','Ongkir has not been deleted');
        }
    }
}
