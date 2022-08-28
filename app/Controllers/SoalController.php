<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Soal;
use App\Models\Mapel;

class SoalController extends BaseController
{
    public function index()
    {   
        $model = new Mapel();
        $data = [
            'content' => $model->findAll(),
            'title' => 'Soal Ujian Tutor',
        ];
        return view('dashboard/pages/soal/index', $data);
    }

    public function indexMapel($id)
    {
        $model = new Soal();
        $modelM = new Mapel();
        $data = [
            'content' => $model->getSoal($id)->getResult(),
            'mapel' => $modelM->where('id', $id)->first(),
            'id' => $id,
            'title' => 'Soal Mata Pelajaran'
        ];
        //dd($data);
        return view('dashboard/pages/soal/index_mapel', $data);
    }

    public function add($id)
    {
        $data = [
            'id' => $id,
            'title' => 'Tambah Soal',
        ];
        return view('dashboard/pages/soal/add', $data);
    }

    public function save()
    {
        $model = new Soal();
        $req = $this->request;
        $id = $req->getVar('id_mapel');
        $data = [
            'pertanyaan' => $req->getVar('pertanyaan'),
            'pilihan' => $req->getVar('pilihan'),
            'correct_answer' => $req->getVar('correct_answer'),
            'id_mapel' => $id,
        ];
        $model->save($data);

        //dd($data);
        session()->setFlashdata('success', 'Soal telah ditambahkan.');
        return redirect()->to('dashboard/master/soal/mapel/'.$id);
    }

    public function edit($id, $ids)
    {
        $model = new Soal();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'id' => $ids,
            'title' => 'Edit Soal',
        ];
        return view('dashboard/pages/soal/edit', $data);
    }

    public function update($ids)
    {
        $model = new Soal();
        $req = $this->request;
        $id = $req->getVar('id');
        $data = [
            'pertanyaan' => $req->getVar('pertanyaan'),
            'pilihan' => $req->getVar('pilihan'),
            'correct_answer' => $req->getVar('correct_answer'),
        ];
        $model->update($id, $data);
        session()->setFlashdata('success', 'Soal telah ditambahkan.');
        return redirect()->to('dashboard/master/soal/mapel/'.$ids);
    }

    public function delete($id, $ids)
    {
        $model = new Soal();
        $model->where('id', $id)->delete();
        session()->setFlashdata('success', 'Berhasil delete data.');
        return redirect()->to('dashboard/master/soal/mapel/'.$ids);
    }
}
