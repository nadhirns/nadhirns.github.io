<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function list()
    {
        $alternatif = Alternatif::with('penilaian.crips')->get();
        $kriteria = Kriteria::with('crips')->orderBy('nama_kriteria', 'ASC')->get();
        return view('admin.penilaian.list', compact('alternatif', 'kriteria'));
    }

    public function insertPenilaian(Request $request)
    {
        DB::select("TRUNCATE penilaian");
        foreach ($request->crips_id as $key => $value) {
            foreach ($value as $key_1 => $value_1) {
                Penilaian::create([
                    'alternatif_id' => $key,
                    'crips_id' => $value_1
                ]);
            }
        }
        return redirect('admin/penilaian/list-penilaian')->with('success', 'Berhasil menyimpan Data');
    }
}
