<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form', 'url']);
        if (session()->get('is_logged_in')) {
            return redirect()->to('/customers');
        }
        return view('login');
    }

    public function attempt()
    {
        $data = [
            'username' => strtolower(trim((string) $this->request->getPost('username'))),
            'password' => (string) $this->request->getPost('password'),
        ];
        if (! $this->validateData($data, ['username' => 'required', 'password' => 'required'])) {
            return redirect()->to('/login')->withInput()->with('error', 'Enter your username and password.');
        }
        $user = (new UserModel())->where('username', $data['username'])->first();
        if (! $user || ! password_verify($data['password'], (string) ($user['password'] ?? ''))) {
            return redirect()->to('/login')->withInput()->with('error', 'Invalid username or password.');
        }
        session()->regenerate(true);
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'full_name' => $user['full_name'],
            'is_logged_in' => true,
        ]);
        return redirect()->to('/customers');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
