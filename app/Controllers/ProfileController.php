<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserDetailTutor;
use App\Models\UserDetailSiswa;
use App\Models\Mapel;

class ProfileController extends BaseController
{
    public function index($token)
    {
        helper('number');
        $model = new UserDetail();
        $modelUDT = new UserDetailTutor();
        $mapel = new Mapel();
        $data = [
            'content' => $model->where('id_token_ud', $token)->first(),
            'tutor' => $modelUDT->where('id_token_udrt', $token)->first(),
            'mapel' => $mapel->findAll(),
            'pages' => 'Profile Saya',
        ];
        return view('dashboard/pages/profile/index', $data);
    }

    public function update()
    {
        $req = $this->request;
        $model = new UserDetail();
        $id = $req->getVar('id');
        $data = [
            'name' => $req->getVar('name'),
            'address' => $req->getVar('address'),
            'phone_number' => $req->getVar('phone_number'),
            'bio' => $req->getVar('bio'),
            'dob' => $req->getVar('dob'),
        ];
        $model->update($id, $data);
        //dd($data)
        session()->setFlashdata('success', 'Data diri telah diupdate.');
        return redirect()->to('dashboard/profile/'.session()->get('id_token'));
    }

    public function updateTutor()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|min_length[16]|max_length[16]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 16 Karakter',
                    'max_length' => '{field} Maksimal 16 Karakter',
                ]
            ],
            'cv' => [
                'rules' => 'mime_in[cv,application/pdf]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format PDF.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $req = $this->request;
        $model = new UserDetailTutor();

        $img    = $req->getFile('cv');
        $randName = $img->getRandomName();
        $id = $req->getVar('id');

        if ($img->isValid() && ! $img->hasMoved()) {
            //pindah file ke folder profile
            $img->move('profile',$randName);
            $model = new UserDetailTutor();
            $id = $req->getVar('id');
            $data = [
                'profession' => $req->getVar('profession'),
                'cv' => $randName,
                'nik' => $req->getVar('nik'),
                'mapel' => $req->getVar('mapel'),
                'harga' => $req->getVar('harga'),
            ];
            $model->update($id, $data);
            session()->setFlashdata('success', 'Data tutor telah diupdate.');
            return redirect()->to('dashboard/profile/'.session()->get('id_token'));
        } else {
            $model = new UserDetailTutor();
            $id = $req->getVar('id');
            $data = [
                'profession' => $req->getVar('profession'),
                'nik' => $req->getVar('nik'),
                'mapel' => $req->getVar('mapel'),
                'harga' => $req->getVar('harga'),
            ];
            $model->update($id, $data);
            session()->setFlashdata('success', 'Data tutor telah diupdate.');
            return redirect()->to('dashboard/profile/'.session()->get('id_token'));
        }
    }

    public function FillUrData($token)
    {
        $model = new UserDetail();
        $data = [
            'content' => $model->where('id_token_ud', $token)->first(),
            'pages' => 'Lengkapi Data Diri',
        ];
        return view('dashboard/pages/lengkapi-data-diri', $data);
    }

    public function SendData()
    {
        $req = $this->request;
        $id = $req->getVar('id');
        $model = new UserDetail();
        $data = [
            'dob'      => $req->getVar('dob'),
            'address'   => $req->getVar('address'),
            'sex'       => $req->getVar('sex'),
            'phone_number'=> $req->getVar('phone_number'),
            'bio'       => $req->getVar('bio'),
            'dob'       => $req->getVar('dob'),
            'wannabe'   => $req->getVar('wannabe'),
            'name'      => $req->getVar('name'),
        ];
        $model->update($id, $data);

        session()->setFlashdata('success', 'Data diri telah dikirim! Silahkan tunggu 1x24.');
        return redirect()->to('dashboard');
    }
}
