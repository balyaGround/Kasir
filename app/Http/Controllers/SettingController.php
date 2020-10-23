<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $userAll = User::with(['Toko','Role'])->get();

        $data=[
            'userAll' => $userAll
        ];
        return view('admin.settings.index', ['data' => $data]);
    }
}
