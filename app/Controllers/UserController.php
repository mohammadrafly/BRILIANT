<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserDetailTutor;
use App\Models\UserDetailSiswa;
use App\Models\Bridge;
use App\Models\Transaction;

class UserController extends BaseController
{
    public function index()
    {
        $model = new User();
        $data = [
            'content' => $model->getAllUser()->getResult(),
            'title' => 'List User',
        ];
        return view('dashboard/pages/users/all-user', $data);
    }

    public function indexAdmin()
    {
        $model = new User();
        $data = [
            'content' => $model->getAllAdmin()->getResult(),
            'title' => 'List Admin',
        ];
        return view('dashboard/pages/users/admin-user', $data);
    }

    public function indexSiswa()
    {
        $model = new User();
        $data = [
            'content' => $model->getAllSiswa()->getResult(),
            'title' => 'List Siswa',
        ];
        return view('dashboard/pages/users/siswa-user', $data);
    }

    public function indexTutor()
    {
        $model = new User();
        $data = [
            'content' => $model->getAllTutor()->getResult(),
            'title' => 'List Tutor',
        ];
        return view('dashboard/pages/users/tutor-user', $data);
    }
    
    public function indexUnverified()
    {
        $model = new User();
        $data = [
            'content' => $model->getUnverifiedUser()->getResult(),
            'title' => 'Verifikasi User',
        ];
        //dd($data);
        return view('dashboard/pages/users/unverified-user', $data);
    }

    public function Unverified($token)
    {
        $model = new User();
        $data = [
            'content' => $model->where('id_token', $token)->first(),
            'title' => 'Verifikasi User',
        ];
        //dd($data);
        return view('dashboard/pages/users/unverified-user-single', $data);
    }

    public function Verifying()
    {
        $req = $this->request;
        $id = $req->getVar('id');
        $role = $req->getVar('role');
        $token = $req->getVar('id_token');
        $model = new User();
        $modelUDT = new UserDetailTutor();
        $modelUDS = new UserDetailSiswa();
        if ($role === 'tutor') {
            $data = [
                'role' => $role,
            ];
            if ($model->update($id, $data)) {
                $data = [
                    'id_token_udrt' => $token
                ];
                $modelUDT->save($data);

                session()->setFlashdata('success', 'Berhasil update data.');
                return redirect()->to('dashboard/user/unverified');
            }
        } elseif ($role === 'siswa') {
            $data = [
                'is_verified' => $req->getVar('is_verified'),
                'role' => $role,
            ];
            if ($model->update($id, $data)) {
                $data = [
                    'id_token_udrs' => $token
                ];
                $modelUDS->save($data);

                session()->setFlashdata('success', 'Berhasil update data.');
                return redirect()->to('dashboard/user/unverified');
            }
        }
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah User',
        ];
        return view('dashboard/pages/users/add', $data);
    }

    public function save()
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

        $token = openssl_random_pseudo_bytes(16);
        //$kode = bin2hex(random_bytes(16));
        $token = bin2hex($token);
        $model = new User();
        $req = $this->request;
        $data = [
            'email' => $req->getVar('email'),
            'password' => $req->getVar('password'),
            'role' => $req->getVar('role'),
            'id_token' => $token,
            'is_verified' => $req->getVar('is_verified'),
        ];
        $model->save($data);

        session()->setFlashdata('success', 'Berhasil tambah user.');
        return redirect()->to('dashboard/user/list');   
    }

    public function editUser($token)
    {
        $model = new User();
        $data = [
            'content' => $model->where('id_token', $token)->first(),
            'title' => 'Edit User',
        ];
        return view('dashboard/pages/users/edit', $data);
    }

    public function updateUser()
    {
        $model = new User();
        $req = $this->request;
        $id = $req->getVar('id');
        $data = [
            'email' => $req->getVar('email'),
            'role' => $req->getVar('role'),
            'is_verified' => $req->getVar('is_verified'),
        ];
        $model->update($id, $data);

        session()->setFlashdata('success', 'Berhasil update user.');
        return redirect()->to('dashboard/user/list');
    }

    public function removeUser($token)
    {
        $model = new User();
        $modelUD = new UserDetail();
        $modelUDS = new UserDetailSiswa();
        $modelUDT = new UserDetailTutor();
        $modelT = new Transaction();
        $modelB = new Bridge();
        $checkpoint = $model->where('id_token', $token)->first();
        if ($checkpoint['role'] === 'unset') {
            $model->where('id', $checkpoint['id'])->delete();
            session()->setFlashdata('success', 'Berhasil delete user.');
            return redirect()->to('dashboard/user/list');
        } elseif ($checkpoint['role'] === 'siswa') {
            $checkpoint_siswa = $modelUD->where('id_token_ud', $token)->first();
            if ($checkpoint_siswa === TRUE) {
                $modelUD->where('id', $checkpoint_siswa['id'])->delete();
                
            }
        }
        dd($checkpoint_siswa);
    }

    public function PreviewIjazah($email)
    {
        $model = new User();
        $data = [
            'content' => $model->getSingleTutor($email)->getResult(),
            'title' => 'Preview Ijazah',
        ];
        return view('dashboard/pages/users/preview_ijazah', $data);
    }
}
