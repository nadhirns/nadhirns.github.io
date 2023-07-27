<?php

namespace App\Http\Controllers;

use App\Models\Crips;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Kriteria::getKriteria();
        $data['header_title'] = 'List Kriteria';
        return view('admin.kriteria.list', $data);
    }

    public function insertKriteria(Request $request)
    {
        request()->validate([
            'nama_kriteria' => 'required|string',
            'attribut' => 'required|string',
            'bobot' => 'required|numeric'
        ]);

        $kriteria = new Kriteria();
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->attribut = $request->attribut;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();
        return redirect('admin/kriteria/list-kriteria')->with('success', 'Berhasil menambahkan data');
    }

    public function editKriteria($id)
    {
        $data['getRecord'] = Kriteria::findOrFail($id);
        return view('admin.kriteria.edit', $data);
    }

    public function updateKriteria($id, Request $request)
    {
        request()->validate([
            'nama_kriteria' => 'required|string',
            'attribut' => 'required|string',
            'bobot' => 'required|numeric'
        ]);
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update([
            'nama_kriteria' => $request->nama_kriteria,
            'attribut' => $request->attribut,
            'bobot' => $request->bobot
        ]);
        return redirect('admin/kriteria/list-kriteria')->with('success', 'Kriteria berhasil diupdate');
    }

    public function deleteKriteria($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
        return redirect('admin/kriteria/list-kriteria')->with('success', 'Kriteria berhasil dihapuskan');
    }

    public function showCrips($id)
    {
        $data['kriteria'] = Kriteria::findOrFail($id);
        $data['crips'] = Crips::where('kriteria_id', $id)->get();
        return view('admin.kriteria.show', $data);
    }
}
