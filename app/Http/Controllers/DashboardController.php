<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (Auth::user()->user_type == 1) {
            $data['totalPendaftar'] = Pendaftaran::getTotalRegist(1);
            $data['totalSiswa'] = User::getTotalStudent(2);
            $data['totalAdmin'] = User::getTotalAdmin(1);
            return view('admin.dashboard', $data);
        }
    }
}
