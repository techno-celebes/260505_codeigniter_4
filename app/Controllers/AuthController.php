<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('pages/auth/login');
    }

    public function register()
    {
        return view('pages/auth/register');
    }

    public function processLogin()
    {
        $model = new UserModel();

        $user = $model->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {

            session()->set([
                'user_id' => $user['id'],
                'name' => $user['name'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function processRegister()
    {
        $model = new UserModel();

        $model->insert([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            )
        ]);

        return redirect()->to('/login')->with('success', 'Register berhasil, silakan login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}