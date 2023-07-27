<?php

namespace App\Http\Controllers;

use App\Models\Crips;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class CripsController extends Controller
{
    public function insertCrips(Request $request)
    {
        $validatedData = $request->validate([
            'kriteria_id' => 'required|integer', // Sesuaikan validasi sesuai kebutuhan
            'nama_crips' => 'required|string',
            'bobot' => 'required|numeric'
        ]);

        // Buat entri crips baru
        $crips = new Crips();
        $crips->kriteria_id = $validatedData['kriteria_id'];
        $crips->nama_crips = $validatedData['nama_crips'];
        $crips->bobot = $validatedData['bobot'];
        $crips->save();

        // Redirect atau berikan respon sesuai kebutuhan
        return back()->with('success', 'Berhasil menambahkan data');
    }

    public function editCrips($id)
    {
        $data['crips'] = Crips::findOrFail($id);

        return view('admin.crips.edit', $data);
    }

    public function updateCrips(Request $request, $id)
    {
        $crips = Crips::findOrFail($id);
        $crips->update([
            'nama_crips' => $request->nama_crips,
            'bobot' => $request->bobot
        ]);
        return back()->with('success', 'Berhasil update Crips');
    }

    public function deleteCrips($id)
    {
        $crips = Crips::findOrFail($id);
        $crips->delete();
        return back()->with('success', 'Berhasil hapus Crips');
    }
}
