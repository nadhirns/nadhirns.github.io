<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $data['header_title'] = 'Profile Siswa';
        return view('student.profile', $data);
    }

    public function editProfile(Request $request)
    {
        $message = [
            'nama.required' => 'Nama tidak boleh kosong',
            'tempat.required' => 'Tempat lahir tidak boleh kosong',
            'tanggal.required' => 'Tanggal lahir tidak boleh kosong',
            'jk.required' => 'Jenis Kelamin harus dipilih',
            'hp.required' => 'no hp harus di isi'
        ];

        request()->validate([
            'nama' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'jk' => 'required',
            'hp' => 'required|no_hp|unique:profile_user'
        ], $message);

        $file = $request->file('foto');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $namaFolder = 'foto profil';
            $file->move($namaFolder, $nama_file);
            $pathFoto = $namaFolder . "/" . $nama_file;
        } else {
            $pathFoto = $request->pathFoto;
        }

        ProfileUser::where("user_id", Auth::user()->id)->update([
            'nama' => $request->nama,
            'foto' => $pathFoto,
            'tempat_lahir' => $request->tempat,
            'tanggal_lahir' => $request->tanggal,
            'gender' => $request->jk,
            'no_hp' => $request->hp,
            'alamat' => $request->alamat,
            'instagram' => $request->ig
        ]);
        User::where("id", Auth::user()->id)->update([
            'name' => $request->nama
        ]);
    }
}
