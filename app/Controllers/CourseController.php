<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mapel;

class CourseController extends BaseController
{
    public function indexMapel()
    {
        $model = new Mapel();
        $data = [
            'content' => $model->findAll(),
            'title' => 'List Mapel'
        ];
        return view('dashboard/pages/course/index', $data);
    }

    public function addMapel()
    {
        $data = [
            'title' => 'Tambah Mata Pelajaran',
        ];
        return view('dashboard/pages/course/add', $data);
    }

    public function saveMapel()
    {
        $model = new Mapel();
        $data = [
            'name' => $this->request->getVar('name')
        ];
        $model->save($data);

        session()->setFlashdata('success', 'Berhasil menambah data.');
        return redirect()->to('dashboard/master/mapel');
    }

    public function editMapel($id)
    {
        $model = new Mapel();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'title' => 'Edit Mata Pelajaran',
        ];
        //dd($data);
        return view('dashboard/pages/course/edit', $data);
    }

    public function updateMapel()
    {
        $model = new Mapel();
        $req = $this->request;
        $id = $req->getVar('id');
        $data = [
            'name' => $req->getVar('name'),
        ];
        //dd($data, $id);
        $model->update($id, $data);

        session()->setFlashdata('success', 'Berhasil update data.');
        return redirect()->to('dashboard/master/mapel');
    }

    public function deleteMapel($id)
    {
        $model = new Mapel();
        $model->where('id', $id)->delete();

        session()->setFlashdata('success', 'Berhasil delete data.');
        return redirect()->to('dashboard/master/mapel');
    }
}
