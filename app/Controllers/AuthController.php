<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserDetailSiswa;

class AuthController extends BaseController
{
    public function Login()
    {
        return view('auth/pages/login');
    }

    public function LoginProced()
    {
        $model = new User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $konfirmasiPassword = password_verify($password, $pass);
            if ($konfirmasiPassword) {
                $setData = [
                    'id'        => $data['id'],
                    'email'     => $data['email'],
                    'role'      => $data['role'],
                    'id_token'  => $data['id_token'],
                    'created_at'=> $data['created_at'],
                    'bridge_token'=> $data['bridge_token'],
                    'WesLogin'  => TRUE,
                ];
                session()->set($setData);
                //dd($setData);
                if ($data['role'] === 'siswa') {
                    return redirect()->to('/');
                } else {
                    return redirect()->to('dashboard');
                }
                //dd($setData);
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->to('login');
            }
        } else {
            session()->setFlashdata('error', 'Email tidak ada di database!');
            return redirect()->to('login');
        }
    }

    public function Register()
    {
        return view('auth/pages/register');
    }

    public function RegisterProced()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|min_length[4]|max_length[50]|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'min_length' => 'Email minimal 4 Karakter',
                    'max_length' => 'Email maksimal 50 Karakter',
                    'is_unique' => 'Email sudah digunakan'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 Karakter',
                    'max_length' => 'Password maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak sesuai dengan password di atas',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $model = new User();
        $modelUD = new UserDetail();
        $token = openssl_random_pseudo_bytes(16);
        //$kode = bin2hex(random_bytes(16));
        $token = bin2hex($token);
        $data = [
            'email'      => $this->request->getVar('email'),
            'id_token'   => $token,
            'password'   => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'       => 'unset',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'is_verified'=> 'pending',
            //'bridge_token' => $kode,
        ];
        if ($model->save($data)) {
            $dataUD = [
                'id_token_ud' => $token
            ];
            //dd($dataUD);
            $modelUD->save($dataUD);

            session()->setFlashdata('success', 'Anda telah berhasil daftar silahkan login.');
            return redirect()->to('login');
        } else {
            session()->setFlashdata('error', 'Gagal!');
            return redirect()->to('register');
        }
    }

    public function Logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
