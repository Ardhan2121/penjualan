<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Sp;
use Exception;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Contracts\Session\Session;

class TransaksiController extends Controller
{
    private $id;

    public function __construct()
    {
        $this->getPesanan();
        $this->id = IdGenerator::generate(['table' => '2122091_sp', 'field' => '2122091_NoSP', 'length' => 6, 'prefix' => 'SP']);
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $barangs = Barang::all();
        $id = $this->id;
        $this->getPesanan();

        return view('transaksi.create', compact('id', 'pelanggans', 'barangs'));
    }

    public function store()
    {
        try {
            if (session()->has('pelanggan')) {
                $sp = Sp::create([
                    '2122091_NoSP' => $this->id,
                    '2122091_IdPelanggan' => session()->get('pelanggan'),
                    '2122091_TglSP' => date('Y-m-d'),
                ]);
                $listpesanan = $this->getPesanan();
                if (!empty($listpesanan)) {
                    foreach ($listpesanan as $pesanan) {
                        Barang::find($pesanan['kd'])->decrement('2122091_Stok', $pesanan['qty']);
                        $sp->barangs()->attach($pesanan['kd'], ['2122091_JmlJual' => $pesanan['qty'], '2122091_HrgJual' => $pesanan['harga']]);
                    }
                } else {
                    throw new Exception();
                }
                session()->forget(['pesanan', 'pelanggan']);
                return redirect()->back()->with('success', 'berhasil membuat pesanan');
            } else {
                throw new Exception();
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors('gagal membuat surat pesan');
        }
    }

    public function getPelanggan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        session()->put('pelanggan', $pelanggan->{'2122091_IdPelanggan'});
        return response()->json($pelanggan);
    }

    public function getBarang($id)
    {
        $barang = Barang::findOrFail($id);
        return response()->json($barang);
    }

    public function getPesanan()
    {
        if (session()->has('pesanan.cart')) {
            $dataPesanan = session()->get('pesanan.cart');
            foreach ($dataPesanan as $key => $value) {
                $stok = Barang::Find($value['kd'])->{'2122091_Stok'};
                $dataPesanan[$key]['stok'] = $stok;
                session()->put('pesanan.cart', $dataPesanan);
            }
            return session()->get('pesanan.cart');
        }
        return false;
    }

    public function hapusSemuaPesanan()
    {
        session()->forget(['pesanan', 'pelanggan']);
        return redirect()->back()->with('success', 'berhasil reset pesanan');
    }

    public function hapusPesanan($id)
    {
        session()->pull('pesanan.cart.' . $id);
        return redirect()->back()->with('success', 'berhasil hapus pesanan');
    }

    public function setPesanan(Request $request)
    {
        $request->validate([
            'kdbarang' => 'required',
            'hargajual' => 'required|numeric',
            'qty' => 'required|numeric'
        ]);
        try {
            $barang = Barang::findOrFail($request->kdbarang);
            if ($request->hargajual < $barang->{'2122091_HrgBarang'}) {
                return redirect()->back()->withErrors("harga pesan tidak boleh lebih kecil dari harga barang");
            }
            if ($request->qty > $barang->{'2122091_Stok'}) {
                return redirect()->back()->withErrors('QTY Melebihi stok yang ada');
            }

            $dataPesanan = session()->get('pesanan.cart', []);
            $pesanan = [
                'kd' => $barang->{'2122091_KdBarang'},
                'nama' => $barang->{'2122091_NmBarang'},
                'stok' => $barang->{'2122091_Stok'},
                'satuan' => $barang->{'2122091_Satuan'},
                'harga' => $request->hargajual,
                'qty' => $request->qty,
                'total' => $request->qty * $request->hargajual
            ];

            $sudahAda = false;

            foreach ($dataPesanan as $key => $value) {
                if ($pesanan['kd'] == $dataPesanan[$key]['kd']) {
                    $dataPesanan[$key]['qty'] += $pesanan['qty'];
                    $dataPesanan[$key]['total'] += $pesanan['total'];
                    $dataPesanan[$key]['harga'] = $pesanan['harga'];

                    if (($dataPesanan[$key]['qty']) > $barang->{'2122091_Stok'}) {
                        return redirect()->back()->withErrors('QTY Melebihi stok yang ada');
                    }

                    $request->session()->put('pesanan.cart', $dataPesanan);
                    $sudahAda = true;
                    break;
                }
            }

            if (!$sudahAda) {
                $request->session()->push('pesanan.cart', $pesanan);
            }
            return redirect()->back()->with('success', "berhasil tambah barang");
        } catch (Exception $e) {
            return redirect()->back()->withErrors("gagal tambah barang");
        }
    }
}
