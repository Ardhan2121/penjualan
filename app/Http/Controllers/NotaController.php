<?php

namespace App\Http\Controllers;

use App\Models\Sp;
use App\Models\Nota;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class NotaController extends Controller
{
    private $id;

    public function __construct()
    {
        $this->id = IdGenerator::generate(['table' => '2122091_nota', 'field' => '2122091_NoNota', 'length' => 6, 'prefix' => 'NT']);
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $sps = Sp::with('pelanggan')->doesntHave('nota')->get();
        $id = $this->id;
        return view('nota.create', compact('id', 'pelanggans', 'sps'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nopesan' => 'required|exists:2122091_Sp,2122091_NoSP'
        ]);

        try {
            $sp = Sp::findOrFail($request->nopesan);
            $totalharga = 0;

            foreach ($sp->barangs()->get() as $barang) {
                $totalharga += $barang->pivot->{'2122091_HrgJual'} * $barang->pivot->{'2122091_JmlJual'};
            }

            if ($sp && !$sp->nota()->exists()) {
                $sp->nota()->create([
                    '2122091_NoNota' => $this->id,
                    '2122091_TglNota' => date('Y-m-d'),
                    '2122091_JmlHarga' => $totalharga
                ]);
                return redirect()->route('nota.show', ['id' => $this->id])->with('success', 'berhasil cetak nota');
            }
            else {
                return redirect()->back()->withErrors('nota sudah pernah di print');
            }

        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function show($id)
    {
        $nota = Nota::find($id);
        $pesanans = $nota->sp->barangs()->get();
        $pdf = Pdf::loadView('nota.show', ['nota' => $nota, 'pesanans' => $pesanans])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function cariSp($id)
    {
        $sp = Sp::find($id);
        $pelanggan = $sp->pelanggan()->first();
        $dataPesanan = $sp->barangs()->get();
        $HasilData = view('nota.datapesanan.data', compact('dataPesanan'))->render();

        $data = [
            "sp" => $sp,
            "pelanggan" => $pelanggan,
            "pesanan" => $HasilData
        ];

        return response()->json($data);
    }
}
