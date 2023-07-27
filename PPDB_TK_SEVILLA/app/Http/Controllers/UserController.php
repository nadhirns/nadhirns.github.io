<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfileUser;
use Illuminate\Support\Str;
use File;
use Alert;

class UserController extends Controller
{
    //data user
    public function dataUser()
    {
        $dataUser = User::all();
        $kode = ProfileUser::id();
        return view('user.data-user-admin', compact('dataUser', 'kode'));
    }

    public function simpanuser(Request $request)
    {
        try {
            $request->merge(['password' => Hash::make($request->input('password'))]);
            $checkuser = User::where('email', $request->email)->first();
            if ($checkuser) {
                return redirect()->back()->with('warning', 'Email Telah Terdaftar!');
            }
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->level,
                'created_at' => now()
            ]);
            $usersid  = User::orderBy('id', 'DESC')->first();
            $file = $request->file('foto');
            if (file_exists($file)) {
                $nama_file = time() . "-" . $file->getClientOriginalName();
                $namaFolder = 'foto profil';
                $file->move($namaFolder, $nama_file);
                $pathFoto = $namaFolder . "/" . $nama_file;

                ProfileUser::create([
                    'user_id' => $usersid->id,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'tanggal_lahir' => "2000-01-01",
                    'gender' => $request->gender,
                    'no_hp' => $request->nohp,
                    'foto' => $pathFoto
                ]);
            } else {
                ProfileUser::create([
                    'user_id' => $usersid->id,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'tanggal_lahir' => "2000-01-01",
                    'gender' => $request->gender,
                    'no_hp' => $request->nohp,
                ]);
            }
            return redirect('/data-user')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            //echo $e;
            return redirect()->back()->with('error', 'Data Tidak Tersimpan, Periksa kembali inputan ada!');
        }
    }

    public function edituser($user_id)
    {
        $dataUser = ProfileUser::all();
        $dataUserbyId = ProfileUser::find($user_id);
        return view('user.data-user-detail', ['viewDataUser' => $dataUser, 'viewData' => $dataUserbyId]);
    }


    public function updateUser(Request $request)
    {
        $id = Auth::user()->profile->id;
        $message = [
            'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
            'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin harus dipilih',
            'no_hp.required' => 'No hp harus di isi'
        ];

        $validatedData = $request->validate([
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required'
        ], $message);

        $profile = ProfileUser::findOrFail($id);

        if ($request->hasFile('foto')) {
            $ext = $request->file('foto')->getClientOriginalExtension();
            $file = $request->file('foto');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile', $filename);

            $profile->foto = $filename;
        }

        $profile->tempat_lahir = trim($validatedData['tempat_lahir']);
        $profile->tanggal_lahir = trim($validatedData['tanggal_lahir']);
        $profile->jenis_kelamin = trim($validatedData['jenis_kelamin']);
        $profile->no_hp = trim($validatedData['no_hp']);
        $profile->save();

        return redirect('/siswa/profile')->with("success", 'Data Berhasil Diubah');
    }




    public function hapususer($user_id)
    {
        //$dataUser = ProfileUser::all();
        try {
            $dataProfileUsers = ProfileUser::find($user_id);
            $id = $dataProfileUsers['Email'];
            $dataUser = User::find($user_id);
            $dataProfileUsers->delete();
            $dataUser->delete();
            return redirect('/data-user')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
    }
}
