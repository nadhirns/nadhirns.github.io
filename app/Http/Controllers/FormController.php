<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\ProfileUser;
use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\Pembayaran;
use App\Models\Whatsapp;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;


class FormController extends Controller
{
    public function list()
    {
        $data = Pendaftaran::getRegist();
        $dataTitle = 'Pendaftaran';
        $dataUser = ProfileUser::all();
        $dataPembayaran = Pembayaran::all();
        // $data['getRecord'] = Pendaftaran::all();
        // $dataTitle['header_title'] = 'Pendaftaran';
        // $dataUser['getRecordUser'] = ProfileUser::all();
        // $dataPembayaran['getRecordPayment'] = Pembayaran::all();
        return view('pendaftaran.list',  [
            'header_title' => $dataTitle,
            'viewDataPembayaran' => $dataPembayaran,
            'viewDataUser' => $dataUser,
            'viewData' => $data
        ]);
    }

    public function getForm()
    {
        $data['header_title'] = 'Formulir';
        $data['getRecord'] = ProfileUser::all();
        return view('pendaftaran.form', $data);
    }

    public function insertRegistration(Request $request)
    {
        $kodependaftaran = Pendaftaran::id();

        $file = $request->file('foto');
        $nama_file = "Pasfoto" . time() . "-" . $file->getClientOriginalName();
        $namaFolder = 'data pendaftar/' . $kodependaftaran;
        $file->move($namaFolder, $nama_file);
        $pathFoto = $namaFolder . "/" . $nama_file;

        // $fileftberkas_ortu = $request->file('ftberkas_ortu');
        // $nama_fileftberkas_ortu = "BerkasOrtu" . time() . "-" . $fileftberkas_ortu->getClientOriginalName();
        // $namaFolderftgaji = 'data pendaftar/' . $kodependaftaran;
        // $fileftberkas_ortu->move($namaFolderftgaji, $nama_fileftberkas_ortu);
        // $pathOrtu = $namaFolderftgaji . "/" . $nama_fileftberkas_ortu;

        Pendaftaran::create([

            // data calon siswa
            'id_pendaftaran' => $kodependaftaran,
            'user_id' => $request->user_id,
            'nama_panggilan' => $request->nama_panggilan,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'anak_ke' => $request->anak_ke,
            'agama' => $request->agama,
            'jumlah_saudara' => $request->jumlah_saudara,
            'tinggal_bersama' => $request->tinggal_bersama,
            'pas_foto' => $pathFoto,

            'email' => $request->email,
            'no_hp_ayah' => $request->no_hp_ayah,
            'no_hp_ibu' => $request->no_hp_ibu,

            'alamat' => $request->alamat,


            // data wali / ortu calon siswa
            // nama ayah ibu
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            //pendidikan
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            // penghasilan
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            // 'berkas_ortu' =>  $pathOrtu,

            // data kesehatan calon siswa
            'penyakit_anak' => $request->penyakit_anak,
            'makanan_bayi' => $request->makanan_bayi,
            'penyakit_kambuh' => $request->penyakit_kambuh,
            // 'obat' => $request->obat,

            'status_pendaftaran' => 'Belum Terverifikasi',
            'tgl_pendaftaran' => now(),
            // 'created_at' => now()
        ]);


        $pendaftaranbaru = Pendaftaran::orderBy('id', 'DESC')->first();
        $id_pendaftaran = $pendaftaranbaru->id;

        //tambah insert
        $kodepembayaran = Pembayaran::id();
        // echo $kodepembayaran;
        Pembayaran::create([
            'id_pembayaran' => $kodepembayaran,
            'bukti_pembayaran' => "NULL",
            'status' => "Belum Bayar",
            'verifikasi' => false,
            'jatuh_tempo'  => now()->addDays(2)->format('Y-m-d'),
            'tanggal_pembayaran' => now(),
            'total_bayar'  => 3000000,
            'id_pendaftaran' => $id_pendaftaran,
            // 'created_at' => now()
        ]);

        $kodepengumuman = Pengumuman::id();
        Pengumuman::create([
            'id_pengumuman' => $kodepengumuman,
            'user_id' => $request->user_id,
            'id_pendaftaran' => $id_pendaftaran,
            'hasil_seleksi' => "Belum Seleksi",
            'status' => false,
        ]);

        Alternatif::create([
            'nama_alternatif' => $request->nama_lengkap,
            'pendaftaran_id' => $id_pendaftaran,
        ]);

        // Kriteria::create([
        //     'nama_kriteria' =>
        // ])

        $untuk_wa = Pengumuman::orderBy('id', 'DESC')->first();
        Whatsapp::create([
            'pengumuman_id' => $untuk_wa->id,
            'nama' => $request->nama_lengkap,
            'no_hp' => $request->no_hp_ibu,
        ]);


        return redirect('/siswa/data-pendaftaran')->with('success', 'Data Tersimpan!!');
    }

    public function editRegistration($id_pendaftaran)
    {
        $data = Pendaftaran::where("id_pendaftaran", $id_pendaftaran)->first();
        $dataTitle['header_title'] = 'Edit - Pendaftaran';
        $dataUser['getRecordUser'] = ProfileUser::all();
        return view('pendaftaran.edit', $dataTitle, ['viewDataUser' => $dataUser, 'viewData' => $data]);
    }

    public function updateRegistration(Request $request, $id_pendaftaran)
    {
        // $message = [
        //     'nisn.required' => 'NISN must be filled',
        //     'nik.required' => 'NIK must be filled',
        //     'nama.required' => 'Name must be filled',
        //     'jk.required' => 'Gender must be filled',
        //     'foto.required' => 'Photo cannot be empty',
        //     'tempatlahir.required' => 'Birthplace must be filled',
        //     'tanggallahir.required' => 'Date of birth must be filled',
        //     'agama.required' => 'Religion must be filled',
        //     'alamat.required' => 'Address must be filled',
        //     'email.required' => 'Email must be filled',
        //     'nohp.required' => 'Mobile phone must be filled',
        //     'gelombang.required' => 'Batch must be filled',
        //     'pil1.required' => 'Prodi choice must be filled',
        //     'pil2.required' => 'Prodi choice must be filled',
        //     'ayah.required' => 'Father`s name must be filled',
        //     'ibu.required' => 'Mother`s name must be filled',
        //     'pekerjaanayah.required' => 'Father`s occupation must be filled',
        //     'pekerjaanibu.required' => 'Mother`s occupation must be filled',
        //     'noayah.required' => 'Father`s phone number must be filled',
        //     'noibu.required' => 'Mother`s phone number must be filled',
        //     'penghasilan_ayah.required' => 'PaySlip must be filled',
        //     'penghasilan_ibu.required' => 'Family dependents must be filled',
        //     'ftberkas_ortu.required' => 'Berkas cannot be empty',
        //     'sekolah.required' => 'School name must be filled',
        //     'smt1.required' => 'Semester 1 must be filled',
        //     'smt2.required' => 'Semester 2 must be filled',
        //     'smt3.required' => 'Semester 3 must be filled',
        //     'smt4.required' => 'Semester 4 must be filled',
        //     'smt5.required' => 'Semester 5 must be filled',
        //     'ftberkas_siswa.required' => 'Raport cannot be empty'
        // ];

        // $cekValidasi = $request->validate([
        //     'nisn' => 'required',
        //     'nik' => 'required',
        //     'nama' => 'required',
        //     'jk' => 'required',
        //     'foto' => 'required',
        //     'tempatlahir' => 'required',
        //     'tanggallahir' => 'required',
        //     'agama' => 'required',
        //     'alamat' => 'required',
        //     'email' => 'required',
        //     'nohp' => 'required',
        //     'gelombang' => 'required',
        //     'pil1' => 'required',
        //     'pil2' => 'required',
        //     'ayah' => 'required',
        //     'ibu' => 'required',
        //     'pekerjaanayah' => 'required',
        //     'pekerjaanibu' => 'required',
        //     'noayah' => 'required',
        //     'noibu' => 'required',
        //     'penghasilan_ayah' => 'required',
        //     'penghasilan_ibu' => 'required',
        //     'ftberkas_ortu' => 'required',
        //     'sekolah' => 'required',
        //     'smt1' => 'required',
        //     'smt2' => 'required',
        //     'smt3' => 'required',
        //     'smt4' => 'required',
        //     'smt5' => 'required',
        //     'ftberkas_siswa' => 'required'
        // ], $message);

        $kodependaftaran = Pendaftaran::id();

        $file = $request->file('foto');
        if (file_exists($file)) {
            $nama_file = "Pasfoto" . time() . "-" . $file->getClientOriginalName();
            $namaFolder = 'data pendaftar/' . $kodependaftaran;
            $file->move($namaFolder, $nama_file);
            $pathFoto = $namaFolder . "/" . $nama_file;
        } else {
            $pathFoto = $request->pathFoto;
        }

        Pendaftaran::where("id_pendaftaran", $id_pendaftaran)->update([
            'nama_panggilan' => $request->nama_panggilan,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'anak_ke' => $request->anak_ke,
            'agama' => $request->agama,
            'jumlah_saudara' => $request->jumlah_saudara,
            'tinggal_bersama' => $request->tinggal_bersama,
            'pas_foto' => $pathFoto,

            'email' => $request->email,
            'no_hp_ayah' => $request->no_hp_ayah,
            'no_hp_ibu' => $request->no_hp_ibu,

            'alamat' => $request->alamat,


            // data wali / ortu calon siswa
            // nama ayah ibu
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            //pendidikan
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            // penghasilan
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            // 'berkas_ortu' =>  $pathOrtu,

            // data kesehatan calon siswa
            'penyakit_anak' => $request->penyakit_anak,
            'makanan_bayi' => $request->makanan_bayi,
            'penyakit_kambuh' => $request->penyakit_kambuh,
            'obat' => $request->obat,

            'status_pendaftaran' => 'Belum Terverifikasi',
            'tgl_pendaftaran' => now(),
            'created_at' => now()
        ]);
    }

    public function deleteRegistration($id_pendaftaran)
    {
        //$dataUser = ProfileUsers::all();
        $data = Pendaftaran::find($id_pendaftaran);
        File::delete($data->pas_foto);

        $dataPembayaran = Pembayaran::where("id_pendaftaran", $id_pendaftaran)->first();
        File::delete($dataPembayaran->bukti_pembayaran);
        $data->delete();
        return redirect('siswa/data-registration')->with('success', 'Data Terhapus!!');
    }

    public function detailRegistration($id_pendaftaran)
    {
        $data = Pendaftaran::where("id_pendaftaran", $id_pendaftaran)->first();
        $dataTitle = 'Detail Pendaftaran';
        $dataUser = ProfileUser::all();
        $dataPembayaran = Pembayaran::where("id_pendaftaran", $data->id)->first();
        $no = 1;


        $dataPendaftaran = Pendaftaran::where("id_pendaftaran", $id_pendaftaran)->get();
        return view('pendaftaran.detail', [
            'header_title' => $dataTitle,
            'no' => $no,
            'dataPendaftaran' => $dataPendaftaran,
            'viewDataUser' => $dataUser,
            'viewDataPembayaran' => $dataPembayaran,
            'viewData' => $data
        ]);
    }

    public function cardRegistration($id_pendaftaran)
    {
        $data = Pendaftaran::find($id_pendaftaran);
        $dataTitle['header_title'] = 'Kartu - Pendaftaran';
        $dataUser = ProfileUser::all();
        return view('pendaftaran.kartu', $dataTitle, ['viewDataUser' => $dataUser, 'viewData' => $data]);
    }

    public function verifikasiStatusRegistration($id_pendaftaran)
    {
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id_pendaftaran", "$id_pendaftaran")->update([
            'status_pendaftaran' => "Terverifikasi"
        ]);
        return redirect('/admin/data-pendaftaran');
    }

    public function notVerifikasiStatusRegistration($id_pendaftaran)
    {
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id_pendaftaran", "$id_pendaftaran")->update([
            'status_pendaftaran' => "Belum Terverifikasi"
        ]);
        return redirect('/admin/data-pendaftaran');
    }

    public function invalidStatusRegistration($id_pendaftaran)
    {
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id_pendaftaran", "$id_pendaftaran")->update([
            'status_pendaftaran' => "Tidak Sah"
        ]);
        return redirect('/admin/data-pendaftaran');
    }

    public function finishStatusRegistration($id_pendaftaran)
    {
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id_pendaftaran", "$id_pendaftaran")->update([
            'status_pendaftaran' => "Selesai"
        ]);
        return redirect('/admin/data-pendaftaran');
    }
}
