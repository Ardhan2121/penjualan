<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BarangController extends Controller
{
    private $id;

    public function __construct()
    {
        $this->id = IdGenerator::generate(['table' => '2122091_barang', 'field' => '2122091_KdBarang', 'length' => 6, 'prefix' => 'BRG']);
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $id = $this->id;
        return view('barang.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(BarangRequest $request)
    {
        try {
            Barang::create([
                '2122091_KdBarang' => $this->id,
                '2122091_NmBarang' => $request->nama,
                '2122091_Satuan' => $request->satuan,
                '2122091_Stok' => $request->stok,
                '2122091_HrgBarang' => $request->harga
            ]);
            return redirect()->route('barang.index')->with('success', "berhasil tambah barang");
        } catch(Exception $e){
            return redirect()->back()->withErrors('gagal tambah barang');
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
        $barang = Barang::findOrFail($id);
        return view('barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(BarangRequest $request, $id)
    {
        try {
            $barang = barang::findOrFail($id);
            $barang->{'2122091_NmBarang'} = $request->nama;
            $barang->{'2122091_Satuan'} = $request->satuan;
            $barang->{'2122091_Stok'} = $request->stok;
            $barang->{'2122091_HrgBarang'} = $request->harga;
            $barang->save();

            return redirect()->route('barang.index')->with('success', "berhasil edit barang");
        }catch(Exception $e){
            return redirect()->back()->withErrors('gagal edit barang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->delete();
            return redirect()->route('barang.index')->with('success', "berhasil hapus barang");

        } catch(Exception $e){
            return redirect()->back()->withErrors('gagal hapus barang');
        }
    }

}
