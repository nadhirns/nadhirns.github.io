<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'List Admin';
        return view('admin.admin.list', $data);
    }

    public function addAdmin()
    {
        $data['header_title'] = 'Tambah Admin';
        return view('admin.admin.add', $data);
    }

    public function insertAdmin(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list-admin')->with('success', 'Admin berhasil ditambahkan');
    }

    public function editAdmin($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'Edit Admin';
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    public function updateAdmin($id, Request $request)
    {
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list-admin')->with('success', 'Data Admin berhasil di Update');
    }

    public function deleteAdmin($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/admin/list-admin')->with('success', 'Admin berhasil dihapuskan');
    }
}
