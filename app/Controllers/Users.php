<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users as ModelsUsers;
use CodeIgniter\HTTP\ResponseInterface;

class Users extends BaseController
{

    protected $model;

    public function __construct()
    {
        $this->model = model(ModelsUsers::class);
    }

    public function index()
    {
        return view('add-user');
    }

    public function profile()
    {
        if (!session()->has('logged_in') || !session()->get('user_name')) {
            return redirect()->to('login')->with('error', 'Please log in to access the dashboard.');
        }

        $userid = session()->get('user_id');
        $data['res'] = $this->model->find($userid);
        return  view('header') . view('navbar') . view('profile', $data);
    }


    public function add_user()
    {

        $user = $this->model->getUserByEmail($this->request->getPost('email'));

        if ($user) {
            session()->setFlashdata('message', 'Duplicate Email Id..!');
            session()->setFlashdata('message_type', 'danger');
            return redirect()->to('./');
            exit;
        }

        $image = $this->request->getFile('image');
        $newName = $image->getRandomName();
        $uploadPath = 'images';
        $image->move($uploadPath, $newName);


        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'image' => $newName
        ];



        if ($this->model->insert($data)) {
            session()->setFlashdata('message', 'User Registration successfully!');
            session()->setFlashdata('message_type', 'success');

            return redirect()->to('/');
        } else {
            return redirect()->back();
            session()->setFlashdata('message', 'User Not Register!');
            session()->setFlashdata('message_type', 'danger');
        }
    }

    public function edit_form($id)
    {
        if (!session()->has('logged_in') || !session()->get('user_name')) {
            return redirect()->to('/login')->with('error', 'Please log in to access the dashboard.');
        }

        $data['res'] = $this->model->find($id);
        return view('header') . view('navbar') . view('user-edit', $data);
    }

    public function update_user($id)
    {

        if ($this->request->getFile('image')->isValid()) {

            unlink('images/' . $this->request->getPost('old_img'));

            $image = $this->request->getFile('image');
            $file = $image->getRandomName();
            $uploadPath = 'images';
            $image->move($uploadPath, $file);
        } else {
            $file = $this->request->getPost('old_img');
        }


        if ($this->request->getPost('old_pass') === $this->request->getPost('password')) {
            $pass = $this->request->getPost('password');
        } else {
            $pass = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $pass,
            'image' => $file
        ];

        if ($this->model->update($id, $data)) {
            session()->setFlashdata('message', 'User updated successfully!');
            session()->setFlashdata('message_type', 'success');
            return redirect()->to('edit-form/' . $id);
        } else {
            return redirect()->back();
            session()->setFlashdata('message', 'User data not updated!');
            session()->setFlashdata('message_type', 'danger');
        }
    }
}
