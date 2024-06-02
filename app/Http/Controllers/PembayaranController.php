<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Http\Requests\StorepembayaranRequest;
use App\Http\Requests\UpdatepembayaranRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $payments = DB::table('payments')->first();
        $pemesanans = DB::table('pemesanans')->where('id_pemesanan','=',$id)->first();
        $ongkirs = DB::table('ongkirs')->get();
        return view('user.pembayaran',['pemesanans' => $pemesanans, 'ongkirs' => $ongkirs,'payments'=>$payments]);
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
        $validatedData = $request->validate([
            'id_payment' => 'required',
            'id_pemesanan' => 'required',
            'buktiBayar' => 'required',
            'totalPembayaran' => 'required',
            'id_ongkir' => 'required'
        ]);

        $users = DB::table('users')->where('id_user','=', auth()->user()->id_user)->update([
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        if($request->hasFile('buktiBayar')){
            $file = $request->file('buktiBayar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('bukti'),$nama_file);
            $validatedData["buktiBayar"] = $nama_file;
        }

        $pembayaran = DB::table('pembayarans')->insert([
            'id_payment' => $validatedData['id_payment'],
            'id_ongkir' => $validatedData['id_ongkir'],
            'id_pemesanan' => $validatedData['id_pemesanan'],
            'buktiBayar' => $validatedData['buktiBayar'],
            'totalPembayaran' => $validatedData['totalPembayaran'],
            'status' => 1,
            'created_at' => now()
        ]);

        if($pembayaran){
            return redirect()->route('verifikasi')->with('success', 'Pembayaran Added Success');
        }else{
            return redirect()->back()->with('error', 'Pembayaran Added Failed');
        }
    }

    public function verifikasi(){
        return view('user.verifikasi');
    }

    public function laporanTransaksi(){
        $pembayarans = DB::table('pembayarans')
        ->select('pembayarans.created_at', 'pembayarans.totalPembayaran','users.name')
        ->join('pemesanans','pemesanans.id_pemesanan','=','pembayarans.id_pemesanan')
        ->join('users','users.id_user','=','pemesanans.id_user')
        ->get();
        return view('Admin.transaksi.index',['pembayarans' => $pembayarans]);
    }
    /**
     * Display the specified resource.
     */
    public function show(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepembayaranRequest $request, pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembayaran $pembayaran)
    {
        //
    }
}
