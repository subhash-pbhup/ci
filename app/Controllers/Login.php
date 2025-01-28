<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login as ModelsLogin;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = model(ModelsLogin::class);
    }
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $session = session();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->model->getUserByEmail($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'user_id' => $user['id'],
                    'user_name' => $user['name'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Invalid password.');
            }
        } else {
            $session->setFlashdata('error', 'User not found.');
        }

        return redirect()->to('/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
