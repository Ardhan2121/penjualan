<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $notas = Nota::with('sp')->get();
        return view('laporan.index', compact('notas'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'submit' => 'required',
            'start' => 'required|date',
            'to' => 'required|date|after_or_equal:start'
        ]);

        if ($request->submit == 'print') {
            $notas = Nota::with('sp')->whereBetween('2122091_TglNota', [$request->start, $request->to])->get();
            $pdf = Pdf::loadView('laporan.cetak', ['notas' => $notas, 'start' => $request->start, 'to' => $request->to])->setPaper('a4', 'landscape');
            return $pdf->stream();
        } else {
            $notas = Nota::with('sp')->whereBetween('2122091_TglNota', [$request->start, $request->to])->get();
            return view('laporan.index', compact('notas'));
        }
    }
}
