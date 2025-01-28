<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{


    public function index()
    {
        if (!session()->has('logged_in') || !session()->get('user_name')) {
            return redirect()->to('/login')->with('error', 'Please log in to access the dashboard.');
        }

        $userid = session()->get('user_id');
        $userModel = new Users();
        $data['res'] = $userModel->find($userid);
        return view('header') . view('navbar') . view('dashboard', $data);
    }
}
