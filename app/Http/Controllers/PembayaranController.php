<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfileUser;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Timeline;

use File;
use Alert;

class PembayaranController extends Controller
{
    public function list()
    {
        $data = Pembayaran::getPayment();
        // $dataPagiPendaftaran = Pendaftaran::getRegist();
        $dataTitle['header_title'] = 'Pembayaran';
        $dataUser = ProfileUser::all();
        $dataPendaftaran = Pendaftaran::all();
        return view('pembayaran.list', $dataTitle, ['viewDataUser' => $dataUser, 'viewData' => $data, 'viewIdPendaftaran' => $dataPendaftaran]);
    }

    public function inputPayment(Request $request)
    {
        //$dataUser = ProfileUsers::all();
        $kode = Pembayaran::id();
        $file = $request->file('bukti');
        $kodependaftaran = $request->id_pendaftaran;
        $nama_file = "payment-" . time() . "-" . $file->getClientOriginalName();
        $namaFolder = 'data pendaftar/' . $kodependaftaran;
        $file->move($namaFolder, $nama_file);
        $pathBukti = $namaFolder . "/" . $nama_file;
        Pembayaran::create([
            'id_pembayaran' => $kode,
            'bukti_pembayaran' => $pathBukti,
            'status' => $request->status,
            'id_pendaftaran' => $request->id_pendaftaran
        ]);
        return redirect('/data-payment')->with('success', 'Data Tersimpan!!');
    }

    public function updatePayment(Request $request, $id_pembayaran)
    {
        //$dataUser = ProfileUsers::all();
        $file = $request->file('bukti');
        if (file_exists($file)) {
            $kodependaftaran = $request->id_pendaftaran;
            $nama_file = "payment-" . time() . "-" . $file->getClientOriginalName();
            $namaFolder = 'data pendaftar/' . $kodependaftaran;
            $file->move($namaFolder, $nama_file);
            $pathBukti = $namaFolder . "/" . $nama_file;
        } else {
            $pathBukti = $request->pathnya;
        }

        Pembayaran::where("id_pembayaran", $id_pembayaran)->update([
            'bukti_pembayaran' => $pathBukti,
            'status' => $request->status
        ]);
        return redirect('/data-payment')->with('success', 'Data Terubah!!');
    }

    public function updateProofPayment(Request $request)
    {
        //$dataUser = ProfileUsers::all();
        $file = $request->file('pem');
        if (file_exists($file)) {
            $kodependaftaran = $request->id_pendaftaran;
            $nama_file = "payment-" . time() . "-" . $file->getClientOriginalName();
            $namaFolder = 'data pendaftar/' . $kodependaftaran;
            $file->move($namaFolder, $nama_file);
            $pathBukti = $namaFolder . "/" . $nama_file;
        } else {
            $pathBukti = null;
        }
        $id = Pendaftaran::where("id_pendaftaran", $request->id_pendaftaran)->first();
        Pembayaran::where("id_pendaftaran", $id->id)->update([
            'bukti_pembayaran' => $pathBukti,
            'status' => "Dibayar",
        ]);
        return redirect('siswa/detail-pendaftaran' . '/' . $request->id_pendaftaran)->with('success', 'Data Terubah!!');
    }

    public function deletePayment($id_pembayaran)
    {
        //$dataUser = ProfileUsers::all();
        $data = Pembayaran::find($id_pembayaran);
        $data->delete();
        return redirect('/data-payment')->with('success', 'Data Terhapus!!');
    }

    public function verifikasiPayment($id_pembayaran)
    {
        //$dataUser = ProfileUsers::all();
        Pembayaran::where("id_pembayaran", "$id_pembayaran")->update([
            'status' => "Dibayar"
        ]);
        return redirect('/admin/data-pembayaran');
    }

    public function notPayment($id_pembayaran)
    {
        //$dataUser = ProfileUsers::all();
        Pembayaran::where("id_pembayaran", "$id_pembayaran")->update([
            'status' => "Belum Bayar"
        ]);
        return redirect('/admin/data-pembayaran');
    }

    public function invalidPayment($id_pembayaran)
    {
        //$dataUser = ProfileUsers::all();
        Pembayaran::where("id_pembayaran", "$id_pembayaran")->update([
            'status' => "Tidak Sah"
        ]);
        return redirect('/admin/data-pembayaran');
    }
}
