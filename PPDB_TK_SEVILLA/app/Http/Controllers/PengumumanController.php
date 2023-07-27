<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfileUser;
use App\Models\Pengumuman;
use App\Models\Pendaftaran;
use Alert;

class PengumumanController extends Controller
{
    public function list()
    {
        $data = Pengumuman::all();
        $dataTitle['header_title'] = 'List - Pengumuman';
        $dataUser = ProfileUser::all();
        $dataPendaftaran = Pendaftaran::all();
        return view('pengumuman.list', $dataTitle, ['viewDataUser' => $dataUser, 'viewData' => $data, 'viewIdPendaftaran' => $dataPendaftaran]);
    }

    public function detailAnnouncement(Request $request)
    {
        $data = Pengumuman::all();
        $dataTitle['header_title'] = 'List - Pengumuman';
        $dataUser = ProfileUser::all();
        $dataPendaftaran = Pendaftaran::where("id_pendaftaran", $request->id_pendaftaran)->first();
        $dataFindId = Pengumuman::where("id_pendaftaran", $request->id_pendaftaran)->first();
        return view('admin.pengumuman.view', $dataTitle, ['viewDataUser' => $dataUser, 'viewData' => $data, 'viewIdPendaftaran' => $dataPendaftaran, 'viewID' => $dataFindId]);
    }

    public function saveAnnouncement(Request $request)
    {
        //$dataUser = ProfileUsers::all();
        $kode = Pengumuman::id();
        Pengumuman::create([
            'id_pengumuman' => $kode,
            'id_pendaftaran' => $request->id_pendaftaran,
            'hasil_seleksi' => $request->hasil,
            'prodi_penerima' => $request->penerima,
            'nilai_interview' => $request->interview,
            'nilai_test' => $request->test
        ]);
        return redirect('/data-announcement')->with('success', 'Data Tersimpan!!');
    }

    public function updateAnnouncement(Request $request, $id_pengumuman)
    {
        //$dataUser = ProfileUsers::all();
        Pengumuman::where("id_pengumuman", $id_pengumuman)->update([
            'id_pendaftaran' => $request->id_pendaftaran,
            'hasil_seleksi' => $request->hasil,
            'nilai_interview' => $request->interview,
            'nilai_test' => $request->test,
        ]);
        if ($request->hasil == "LULUS" || $request->hasil == "TIDAK LULUS") {
            Pendaftaran::where("id_pendaftaran", "$request->id_pendaftaran")->update([
                "status_pendaftaran" => "Selesai"
            ]);
        }
        return redirect('/data-announcement')->with('success', 'Data Terubah!!');
    }

    public function deleteAnnouncement($id_pengumuman)
    {
        $data = Pengumuman::find($id_pengumuman);
        $data->delete();
        return redirect('/data-announcement')->with('success', 'Data Terhapus!!');
    }
}
