<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $this->request->getPost('username'))
            ->first();

        if ($user && password_verify(
            $this->request->getPost('password'),
            $user['password']
        )) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('/tasks');
        }

        return redirect()->back()
            ->with('error', 'Invalid!!');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')
            ->with('message', 'You have been logged out.');
    }
}