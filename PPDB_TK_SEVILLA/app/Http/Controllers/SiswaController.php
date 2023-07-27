<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'List Siswa';
        return view('admin.student.list', $data);
    }
}
