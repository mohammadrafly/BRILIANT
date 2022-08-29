<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaction;
use App\Models\Jadwal;
use App\Models\User;
use App\Models\UserDetailSiswa;

class TransaksiController extends BaseController
{
    public function index()
    {
        $model = new Transaction();
        $data = [
            'content' => $model->findAll(),
            'title' => 'List Transaksi',
        ];
        //dd($data);
        return view('dashboard/pages/transaksi/index', $data);
    }

    public function Verifying($token)
    {
        $model = new Transaction();
        $data = [
            'content' => $model->where('id', $token)->first(),
            'title' => 'Verifikasi Transaksi',
        ];
        //dd($data);
        return view('dashboard/pages/transaksi/verifying', $data);
    }

    public function VerifyingProced()
    {
        $model = new Transaction();
        $req = $this->request;
        $id = $req->getVar('id');
        $token_tutor = $req->getVar('token_tutor');
        $token_siswa = $req->getVar('token_siswa');
        $data = [
            'status' => $req->getVar('status'),
            'is_active' => $req->getVar('is_active')
        ];
        if($data['status'] === 'verified' or $data['is_active'] === 'active') {
            if ($model->update($id, $data)) {
                $modelUDS = new UserDetailSiswa();
                $checkpoint = $modelUDS->where('id_token_udrs', $token_siswa)->first();
                $id_siswa = $checkpoint['id'];
                $datas = [
                    'token_tutor' => $token_tutor,
                    //'token_siswa' => $token_siswa
                ];
                //dd($id_siswa, $datas);
                $modelUDS->update($id_siswa, $datas);
                session()->setFlashdata('success', 'Berhasil verifikasi data.');
                return redirect()->to('dashboard/transaksi/list');
            } else {
                session()->setFlashdata('error', 'Verifikasi transaksi gagal!.');
                return redirect()->to('dashboard/transaksi/list');
            }
        } elseif($data['status'] === 'unverified' or $data['status'] === 'pending' or $data['status'] === 'blocked') {
            if ($model->update($id, $data)) {
                $modelUDS = new UserDetailSiswa();
                $checkpoint = $modelUDS->where('id_token_udrs', $token_siswa)->first();
                $id_siswa = $checkpoint['id'];
                $datas = [
                    'token_tutor' => '',
                    //'token_siswa' => $token_siswa
                ];
                //dd($id_siswa, $datas);
                $modelUDS->update($id_siswa, $datas);
                session()->setFlashdata('success', 'Berhasil verifikasi data.');
                return redirect()->to('dashboard/transaksi/list');
            } else {
                session()->setFlashdata('error', 'Verifikasi transaksi gagal!.');
                return redirect()->to('dashboard/transaksi/list');
            }
            //$model->update($id, $data);
            //session()->setFlashdata('success', 'Verifikasi berhasil!.');
            //return redirect()->to('dashboard/transaksi/list');
        }
        //dd($datas, $checkpoint, $id_siswa);
        //session()->setFlashdata('success', 'Berhasil verifikasi data.');
        //return redirect()->to('dashboard/transaksi/list');
    }

    public function ListBimbel($token)
    {
        $model = new UserDetail();
        $data = [
            'content' => $model->where('id_token_ud', $id)->first(),
            'title' => 'List Bimbel',
        ];
        return view('dashboard/pages/transaksi/list-bimbel', $data);
    }
}
