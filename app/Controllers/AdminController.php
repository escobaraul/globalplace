<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Shield\Entities\User;

class AdminController extends Controller
{
    public function __construct()
    {
        helper(['auth']);
    }

    public function index()
    {
        if (!auth()->user()->inGroup('admin')) {
            return redirect()->to('/')->with('error', 'Acceso denegado.');
        }
        return view('admin/dashboard');
    }
}