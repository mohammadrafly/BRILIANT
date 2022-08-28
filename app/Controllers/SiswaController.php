<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserDetailSiswa;
use App\Models\Mapel;
use App\Models\Transaction;
use App\Models\Jadwal;

class SiswaController extends BaseController
{
    public function profile($email)
    {
        $model = new User;
        $data = [
            'title' => 'Profile Saya',
            'content' => $model->getSiswaSingle($email)->getResult(),
        ];
        //dd($data);
        return view('landingpage/pages/profile', $data);
    }

    public function saveProfile()
    {
        $req = $this->request;
        $model = new UserDetailSiswa();
        $id = $req->getVar('id_ud');
        $email = session()->get('email');
        $data = [
            'nama_orangtua' => $req->getVar('nama_orangtua'),
            'nomor_orangtua' => $req->getVar('nomor_orangtua'),
            'nama_sekolah' => $req->getVar('nama_sekolah'),
            'tingkat' => $req->getVar('tingkat'),
            'kelas' => $req->getVar('kelas'),
        ];
        //dd($email);
        $model->update($id, $data);

        session()->setFlashdata('success', 'Berhasil update profile.');
        return redirect()->to('dashboard/siswa/profile/'.$email);
    }

    public function bimbel()
    {
        $model = new Mapel();
        $data = [
            'title' => 'List Paket',
            'content' => $model->findAll(),
        ];
        return view('landingpage/pages/paket', $data);
    }

    public function beliBimbel($id)
    {
        helper('number');
        $model = new UserDetail();
        $data = [
            'title' => 'List Tutor Yang Tersedia',
            'content' => $model->getTutorByMapel($id)->getResult()
        ];
        //dd($data);
        return view('landingpage/pages/list_tutor', $data);
    }

    public function prosesBeliBimbel($token)
    {
        $model = new Transaction();
        $kode = bin2hex(random_bytes(16));
        $req = $this->request;
        $checkpoint = $model->where('id_token_siswa', session()->get('id_token'))->first();
        if ($checkpoint === NULL) {
            $data = [
                'id_token_siswa' => session()->get('id_token'),
                'id_token_tutor' => $token,
                'token_transaksi' => $kode,
                'status' => 'unverified',
                'total' => $req->getVar('total'),
                'mapel' => $req->getVar('mapel'),
            ];
            $model->insert($data);

            session()->setFlashdata('success', 'Berhasil melakukan transaksi.');
            return redirect()->to('dashboard/siswa/bimbel');
        } else {
            session()->setFlashdata('error', 'Transaksi Gagal! anda sudah membeli bimbel, silahkan hubungi admin jika ada pertanyaan.');
            return redirect()->to('dashboard/siswa/bimbel');
        }
    }

    public function listKeranjangSaya($token)
    {
        helper('number');
        $model = new Transaction();
        $data = [
            'content' => $model->getDetailTransaction($token)->getResult(),
            'title' => 'Tagihan Saya'
        ];
        //dd($data);
        return view('landingpage/pages/list_tagihan', $data);
    }

    public function bayarTagihan($id)
    {
        if (!$this->validate([
            'receipt' => [
                'rules' => 'mime_in[receipt,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format PNG,JPG, atau JPEG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $req      = $this->request;
        $img      = $req->getFile('receipt');
        $randName = $img->getRandomName();
        $ids      = session()->get('id_token');
        if ($img->isValid() && ! $img->hasMoved()) {
            //pindah file ke folder profile
            $img->move('bukti_pembayaran',$randName);
            $model = new Transaction();
            $data = [
                'receipt' => $randName,
            ];
            if ($model->update($id, $data)) {
                
                session()->setFlashdata('success', 'Berhasil melakukan upload, proses akan memakan waktu 1x24 jam.');
                return redirect()->to('dashboard/siswa/tagihan/'.session()->get('id_token'));
            } else {
                session()->setFlashdata('error', 'Gagal!.');
                return redirect()->to('dashboard/siswa/tagihan/'.session()->get('id_token'));
            }
        } else {
            session()->setFlashdata('error', 'Gagal melakukan upload!.');
            return redirect()->to('dashboard/siswa/tagihan/'.session()->get('id_token'));
        }
    }

    public function jadwalSaya($token)
    {
        $model = new Jadwal();
        $checkpoint = $model->where('bridge_token', $token)->first();
        if (!$checkpoint) {
            session()->setFlashdata('error', 'Anda belum memiliki jadwal.');
            return redirect()->to('dashboard/siswa/profile');
        } else {
            $data = [
                'content' => $model->getDetailJadwal2($token)->getResult(),
                'title' => 'Jadwal Kelas Saya'
            ];
            //dd($data);
            return view('landingpage/pages/list_jadwal', $data);
        }
    }

    public function jadwalSayaNull()
    {
        $data = [
            'title' => 'Jadwal Kelas Saya',
            'content' => NULL
        ];
        return view('landingpage/pages/list_jadwal', $data);
    }
}
