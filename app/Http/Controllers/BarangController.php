<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barang', [
            'title' => 'Daftar Barang',
            'barang' => Barang::all()
        ]);
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
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'harga'=> 'required',
        ]);

        if(Barang::create($validatedData)){
            return redirect('/barang')->with('success','User has been created!!'); 
        }else{
            return redirect('/barang')->with('error','Failed add user data!!');
        }
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
        return response()->json(Barang::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        if(Barang::where('id', $validatedData['id'])->update($validatedData)){
            return redirect("barang")->with('success', 'Edited barang '.$validatedData['nama_barang'].' successfull');
        }else{
            return redirect("barang")->with('error', 'Failed edit data barang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect('/barang')->with('success', 'Barang has been deleted');
    }
}
