<?php

namespace App\Http\Controllers;

use App\Http\Requests\PelangganRequest;
use App\Models\Pelanggan;
use Exception;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PelangganController extends Controller
{
    private $id;

    public function __construct()
    {
        $this->id = IdGenerator::generate(['table' => '2122091_pelanggan', 'field' => '2122091_IdPelanggan', 'length' => 4, 'prefix' => 'P']);
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $id = $this->id;
        return view('pelanggan.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(PelangganRequest $request)
    {
        try {
            Pelanggan::create([
                '2122091_IdPelanggan' => $this->id,
                '2122091_NmPelanggan' => $request->nama,
                '2122091_Alamat' => $request->alamat,
                '2122091_NoTelp' => $request->telepon
            ]);
            return redirect()->route('pelanggan.index')->with('success', "berhasil tambah pelanggan");
        } catch(Exception $e){
            return redirect()->back()->withErrors('gagal tambah pelanggan');
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit',compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(PelangganRequest $request, $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->{'2122091_NmPelanggan'} = $request->nama;
            $pelanggan->{'2122091_Alamat'} = $request->alamat;
            $pelanggan->{'2122091_NoTelp'} = $request->telepon;
            $pelanggan->save();

            return redirect()->route('pelanggan.index')->with('success', "berhasil edit pelanggan");
        }catch(Exception $e){
            return redirect()->back()->withErrors('gagal edit pelanggan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();
            return redirect()->route('pelanggan.index')->with('success', "berhasil hapus pelanggan");

        } catch(Exception $e){
            return redirect()->back()->withErrors('gagal hapus pelanggan');
        }
    }
}
