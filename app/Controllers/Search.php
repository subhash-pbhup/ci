<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Search extends BaseController
{

    public function index()
    {
        if (!session()->has('logged_in') || !session()->get('user_name')) {
            return redirect()->to('/login')->with('error', 'Please log in to access the dashboard.');
        }

        return view('header') . view('navbar') . view('search');
    }
}
