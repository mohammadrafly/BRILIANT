<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jadwal;
use App\Models\UserDetailTutor;
use App\Models\Bridge;
use App\Models\User;

class JadwalController extends BaseController
{
    public function index($token)
    {
        $model = new Jadwal();
        $modelUDT = new UserDetailTutor();
        $data = [
            'content' => $model->getDetailJadwal($token)->getResult(),
            'title' => 'List Jadwal',
            'id_mapel' => $modelUDT->where('id_token_udrt', $token)->first(),
        ];
        //dd($data);
        return view('dashboard/pages/jadwal/index', $data);
    }

    public function addJadwal($id)
    {
        $data = [
            'title' => 'Tambah Jadwal',
            'id_mapel' => $id,
        ];
        return view('dashboard/pages/jadwal/add', $data);
    }

    public function save()
    {
        $model = new Jadwal();
        $req = $this->request;
        $token = bin2hex(random_bytes(16));
        $data = [
            'id_token_tutor' => session()->get('id_token'),
            'id_mapel' => $req->getVar('id_mapel'),
            'start' => $req->getVar('start'),
            'end' => $req->getVar('end'),
            'bridge_token' => $token,
        ];
        $model->save($data);
        session()->setFlashdata('success', 'Berhasil tambah data.');
        return redirect()->to('dashboard/list/jadwal/'.session()->get('id_token'));
    }

    public function edit($id)
    {
        $model = new Jadwal();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'title' => 'Edit Jadwal',
        ];
        //dd($data);
        return view('dashboard/pages/jadwal/edit', $data);
    }

    public function update()
    {
        $model = new Jadwal();
        $req = $this->request;
        $id = $req->getVar('id_jadwal');
        $data = [
            'start' => $req->getVar('start'),
            'end' => $req->getVar('end'),
        ];
        $model->update($id, $data);

        session()->setFlashdata('success', 'Berhasil update data.');
        return redirect()->to('dashboard/list/jadwal/'.session()->get('id_token'));
    }

    public function delete($id)
    {
        $model = new Jadwal();
        $model->where('id', $id)->delete();

        session()->setFlashdata('success', 'Berhasil delete data.');
        return redirect()->to('dashboard/list/jadwal/'.session()->get('id_token'));
    }

    public function listSiswa($bridge)
    {
        $model = new Bridge();
        $data = [
            'content' => $model->getBridges($bridge)->getResult(),
            'title' => 'List Siswa Dalam Jadwal Bridge '.$bridge,
            'bridge' => $bridge,
        ];
        //dd($data);
        return view('dashboard/pages/jadwal/list_siswa', $data);
    }

    public function tambahSiswa($bridge)
    {
        $model = new User();
        $token = session()->get('id_token');
        $data = [
            'content' => $model->getAllSiswaByTokenTutor($token)->getResult(),
            'bridge' => $bridge,
            'title' => 'Tambah Siswa Ke Jadwal'
        ];
        //dd($data);
        return view('dashboard/pages/jadwal/add_siswa', $data);
    }

    public function tambahSiswaProced($bridge)
    {
        $model = new Bridge();
        $modelU = new User();
        $id_token = $this->request->getVar('id_user');
        $data = [
            'id_bridge' => $bridge,
            'id_user' => $id_token,
        ];
        $checkpoint = $modelU->where('id_token', $id_token)->first();
        if (!$model->where('id_user', $id_token)->first()) {
            if ($model->save($data)) {
                $datas = [
                    'bridge_token' => $bridge
                ];
                //dd($checkpoint);
                $modelU->update($checkpoint['id'], $datas);
                session()->setFlashdata('success', 'Berhasil tambah siswa.');
                return redirect()->to('dashboard/jadwal/list/siswa/'.$bridge);
            } else {
                session()->setFlashdata('error', 'Gagal tambah siswa.');
                return redirect()->to('dashboard/jadwal/list/siswa/'.$bridge);
            }
        } else {
            session()->setFlashdata('error', 'Siswa telah memiliki kelas.');
            return redirect()->to('dashboard/jadwal/list/siswa/'.$bridge);
        }
    }

    public function removeSiswa($id, $bridge, $token_user)
    {
        $model = new Bridge();
        $modelU = new User();
        $checkpoint = $modelU->where('id_token', $token_user)->first();
        if ($model->where('id', $id)->delete()) {
            $data = [
                'bridge_token' => NULL
            ];
            if ($modelU->update($checkpoint['id'], $data)) {
                session()->setFlashdata('success', 'Berhasil hapus siswa dari jadwal.');
                return redirect()->to('dashboard/jadwal/list/siswa/'.$bridge);
            } else {
                session()->setFlashdata('error', 'Gagal hapus siswa dari jadwal.');
                return redirect()->to('dashboard/jadwal/list/siswa/'.$bridge);
            }
        } else {
            session()->setFlashdata('error', 'Gagal hapus siswa dari jadwal.');
            return redirect()->to('dashboard/jadwal/list/siswa/'.$bridge);
        }
        //$check =$model->where('id', $id)->first();
        //dd($check);
    }
}
