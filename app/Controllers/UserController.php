<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{

    public function register()
    {
        
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[4]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];
        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
    }

    public function login()
    {
        helper(['form']);
        echo view('signin');
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
    

    public function LoginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $enteredPassword = $this->request->getVar('password');
            $hashedPassword = $data['password'];

            if (password_verify($enteredPassword, $hashedPassword)) {
                $ses_data = [
                    'id' => $data['email'],
                    'isLoggedIn' => true,
                    'userRole' => $data['role'],
                    'username' => $data['username'],
                ];
                $session->remove('validation_errors');
                $session->set($ses_data);
                return redirect()->to('/admin');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to(base_url('/login'));
        }
        
    }
}
