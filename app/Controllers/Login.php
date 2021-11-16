<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Form Login',
        ];

        return view('auth/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Form Register',
            'kodebaru' => $this->userModel->generateId(),
        ];

        return view('auth/register', $data);
    }

    public function cekRegister()
    {
        $data = [
            'id_user' => $this->request->getVar('id_user'),
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => 'U03'
        ];

        dd($data);

        $this->userModel->save($data);
        return redirect()->to('/login')->with('msg', 'Silahkan Login.');
    }

    public function cekLogin()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $log = $this->userModel->getData($username);
        if ($log == null) {
            return redirect()->to('/login')->with('msg', 'password/username salah.');
        }

        if (password_verify($password, $log->password)) {
            $data = [
                'LOGGED_IN' => true,
                'id_user' => $log->id_user,
                'username' => $log->username,
                'level' => $log->level
            ];
            session()->set($data);

            return redirect()->to('/supplier')->with('msg', 'Anda Berhasil Login.');
        } else {
            return redirect()->to('/login')->with('msg', 'password/username salah.');
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
